<?php

function GetRecommended() {
	require_once( 'DAL.class.php' );
	if ( isset( $_SESSION[ "uid" ] ) ) {
		$rec = '<h2>Recommended</h2>
				<a href="#">View more <span class="fas fa-eye"></span></a><br>';
		$sql = "SELECT keyword FROM recommended WHERE user_id = '" . $_SESSION[ "uid" ] . "' GROUP BY keyword ORDER BY COUNT(keyword) DESC";
		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			if ( !empty( $data ) ) {
				$keywords = '';
				for ( $i = 0; $i < count( $data ); $i++ ) {
					$keywords .= $data[ $i ][ "keyword" ] . "|";
				}
				$keys = substr( $keywords, 0, -1 );
			}
		} catch ( Exception $e ) {}


		if ( !empty( $keys ) ) {
			$recQry = "SELECT * FROM products WHERE (products.product_name REGEXP '" . $keys . "' OR products.product_brand REGEXP '" . $keys . "' OR products.model_number REGEXP '" . $keys . "' OR products.subc_id IN (SELECT subc_id FROM sub_categories WHERE sub_categories.subc_name REGEXP '" . $keys . "' )) OR products.subc_id IN (SELECT subc_id FROM recommended WHERE user_id = '" . $_SESSION[ "uid" ] . "' GROUP BY subc_id ORDER BY COUNT(subc_id) DESC)  LIMIT 4";
			try {
				$db = new DAL();
				$recPdt = $db->getData( $recQry );
			} catch ( Exception $e ) {
				echo $e;
			}

			$recList = '';
			$location = "img/products/";
			for ( $i = 0; $i < count( $recPdt ); $i++ ) {
				$recList .= '<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="items col-xs-12">
						<h5>' . $recPdt[ $i ][ "product_brand" ] . '</h5>
						<h5><strong>' . $recPdt[ $i ][ "product_name" ] . '</strong></h5>
						<a href="product-details.php?pid=' . $recPdt[ $i ][ "product_id" ] . '"><img class="img-responsive img-home-portfolio" src="' . $location . $recPdt[ $i ][ "product_name" ] . $recPdt[ $i ][ "model_number" ] . '/' . $recPdt[ $i ][ "product_image" ] . '"></a>
						<div class="prices">
						<h4 class = "col-xs-6" >' . $recPdt[ $i ][ "product_price" ] . ' &#36; </h4>
						<h4 class= "pull-right" > <a href = "cart-mgmt.php?pid=' . $recPdt[ $i ][ "product_id" ] . '" > <span class = "fas fa-cart-plus" ></span></a> </h4>
						</div></div></div>';
			}

			$rec .= $recList . '<br><hr class="col-xs-6 col-xs-offset-3" style="border-top: 1px solid #d50000 !important;"><br><br>';
			echo( $rec );
		}
	}
}

?>