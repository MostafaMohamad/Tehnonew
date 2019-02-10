<?php
include_once( "ws/DAL.class.php" );
session_start();
if ( isset( $_SESSION[ "uid" ] ) && isset( $_GET[ "pid" ] ) ) {
	$sql = "INSERT INTO cart (user_id,product_id,status) VALUES ('" . $_SESSION[ "uid" ] . "','" . $_GET[ "pid" ] . "','active')";
	try {
		$db = new DAL();
		$data = $db->ExecuteQuery( $sql );
		if ( !empty( $data ) ) {
			if ( isset( $_SERVER[ 'HTTP_REFERER' ] ) ) {
				header( "Refresh:0; url='" . $_SERVER[ 'HTTP_REFERER' ] . "'" );
			} else {
				header( "Refresh:0; url='index.php'" );
			}

		}


	} catch ( Exception $e ) {
		echo - 1;
	}

} else if ( empty( $_SESSION[ "uid" ] ) ) {
	header( 'Location: login.html' );
	return;

}


function GetCartItems() {

	if ( isset( $_SESSION[ "uid" ] ) ) {
		$sql = "SELECT * FROM products,cart WHERE products.product_id = cart.product_id AND cart.status = 'active' AND cart.user_id = '" . $_SESSION[ "uid" ] . "' ";
		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			if ( $data != null ) {
				$price_total = 0;
				for ( $i = 0; $i < count( $data ); $i++ ) {
					
					$price_total += (int)$data[ $i ][ "product_price" ]; 
					$dir = $data[ $i ][ "product_name" ] . $data[ $i ][ "model_number" ] . '/';
					echo( '
				<div class="row">
					<div class="col-xs-2 col-md-2 hidden-xs">
						<img class="img-responsive" style="width: 100px;" src="img/products/' . $dir . $data[ $i ][ "product_image" ] . '" alt="prewiew">
					</div>
					<div class="col-xs-4 col-md-6">
						<h4 class="product-name"><strong>' . $data[ $i ][ "product_name" ] . '</strong></h4>
						<h4><small>' . $data[ $i ][ "model_number" ] . '</small></h4>
					</div>
					<div class="col-xs-6 col-md-4 row">
						<div class="col-xs-6 col-md-6 text-right" style="padding-top: 5px">
							<h6 class= "test"><strong>' . $data[ $i ][ "product_price" ] . ' &#36;  <span class="text-muted">x</span></strong></h6>
						</div>
						<div class="col-xs-4 col-md-4">
							<input type="text" class="form-control input-sm price-input" value="1">
						</div>
						<div class="col-xs-2 col-md-2">
							<button type="button" class="btn btn-outline-danger btn-xs cart-del" value = "' . $data[ $i ][ "cart_id" ] . '">
                                <i class="fas fa-trash" aria-hidden="true" style="color: #d50000;"></i>
                            </button>
						
						</div>
					</div>
				</div>
				<hr>
					
					
					' );
				}
				echo('<div class="card-footer">
				<a href="" class="btn btn-default pull-right buybtn">Buy Now</a>
				<div class="pull-right" style="margin: 5px">
					Total <b>'.$price_total.' &#36;</b>
				</div>
			</div>');


			}


		} catch ( Exception $e ) {
			echo - 1;
		}

	} else {
		include( "ws/404-notfound.php" );
	}
}

// Cart items delete
if ( isset( $_GET[ "op" ] ) ) {
	if ( $_GET[ "op" ] == "delcart" ) {

		$sql = "UPDATE cart SET status = 'del' WHERE cart_id = '" . $_GET[ "cart_id" ] . "'";
		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );
			echo($data);


		} catch ( Exception $e ) {
			echo - 1;
		}
	}
}






?>