<?php

function GetRecommended( $all ) {
	$allKeys = array();
	$matchedProducts = array();
	$recommendedProducts = array();
	$rec = '';
	require_once( 'DAL.class.php' );
	if ( isset( $_SESSION[ "uid" ] ) ) {
		if ( !$all ) {
			$rec = '<h2>Recommended</h2>
				<a href="productslist.php?op=recommended">View more <span class="fas fa-eye"></span></a><br>';
		}
		$sql = "SELECT keyword FROM recommended WHERE user_id = '" . $_SESSION[ "uid" ] . "' GROUP BY keyword ORDER BY COUNT(keyword) DESC";
		try {
			$db = new DAL();
			$allKeys = $db->getData( $sql );
			if ( !empty( $allKeys ) ) {
				$keywords = '';
				for ( $i = 0; $i < count( $allKeys ); $i++ ) {
					$keywords .= $allKeys[ $i ][ "keyword" ] . "|";
				}
				$keys = substr( $keywords, 0, -1 );
			}
		} catch ( Exception $e ) {}


		if ( !empty( $keys ) ) {
			$recQry = "SELECT * FROM products,sub_categories WHERE products.subc_id = sub_categories.subc_id AND (products.product_name REGEXP '" . $keys . "' OR products.product_brand REGEXP '" . $keys . "' OR products.model_number REGEXP '" . $keys . "' OR products.subc_id IN (SELECT subc_id FROM sub_categories WHERE sub_categories.subc_name REGEXP '" . $keys . "' )) OR products.subc_id IN (SELECT subc_id FROM recommended WHERE user_id = '" . $_SESSION[ "uid" ] . "' GROUP BY subc_id ORDER BY COUNT(subc_id) DESC)";
			try {
				$db = new DAL();
				$matchedProducts = $db->getData( $recQry );
			} catch ( Exception $e ) {
				echo $e;
			}

			for ( $i = 0; $i < count( $allKeys ); $i++ ) {
				for ( $j = 0; $j < count( $matchedProducts ); $j++ ) {
					if ( strpos( strtolower( $matchedProducts[ $j ][ "product_name" ] ), strtolower( $allKeys[ $i ][ "keyword" ] ) ) !== false ||
						strpos( strtolower( $matchedProducts[ $j ][ "model_number" ] ), strtolower( $allKeys[ $i ][ "keyword" ] ) ) !== false ||
						strpos( strtolower( $matchedProducts[ $j ][ "product_brand" ] ), strtolower( $allKeys[ $i ][ "keyword" ] ) ) !== false ||
						strpos( strtolower( $matchedProducts[ $j ][ "subc_name" ] ), strtolower( $allKeys[ $i ][ "keyword" ] ) ) !== false ) {
						if ( !in_array( $matchedProducts[ $j ], $recommendedProducts ) ) {
							array_push( $recommendedProducts, $matchedProducts[ $j ] );
						}
					}
				}
			}
			if ( !empty( $recommendedProducts ) ) {
				$recList = '';
				$location = "img/products/";
				if ( !$all ) {
					if ( count( $recommendedProducts) > 4 ) {
						$x = 4;
					} else {
						$x = count( $recommendedProducts );
					}
				} else {
					$x = count( $recommendedProducts );
				}
				for ( $i = 0; $i < $x; $i++ ) {
					$recList .= '<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="items col-xs-12">
						<h5>' . $recommendedProducts[ $i ][ "product_brand" ] . '</h5>
						<h5><strong>' . $recommendedProducts[ $i ][ "product_name" ] . '</strong></h5>
						<a href="product-details.php?pid=' . $recommendedProducts[ $i ][ "product_id" ] . '"><img class="img-responsive img-home-portfolio" src="' . $location . $recommendedProducts[ $i ][ "product_name" ] . $recommendedProducts[ $i ][ "model_number" ] . '/' . $recommendedProducts[ $i ][ "product_image" ] . '"></a>
						<div class="prices">
						<h4 class = "col-xs-6" >' . $recommendedProducts[ $i ][ "product_price" ] . ' &#36; </h4>
						<h4 class= "pull-right" > <a href = "cart-mgmt.php?pid=' . $recommendedProducts[ $i ][ "product_id" ] . '" > <span class = "fas fa-cart-plus" ></span></a> </h4>
						</div></div></div>';
				}
				$rec .= $recList;
				if ( !$all ) {
					$rec .= '<br><hr class="col-xs-6 col-xs-offset-3" style="border-top: 1px solid #d50000 !important;"><br><br>';
				}
				echo( $rec );
			}
		}
	}
}

?>