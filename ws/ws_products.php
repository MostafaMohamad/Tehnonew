<?php
header( 'Access-Control-Allow-Origin: *' );
require_once( 'DAL.class.php' );
//get all products
if ( isset( $_GET[ "op" ] ) ) {
	if ( $_GET[ "op" ] == "allproducts" ) {
		$sql = "SELECT * FROM products";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );

		} catch ( Exception $e ) {
			echo - 1;
		}
	}
}
//get featured products
if ( isset( $_GET[ "op" ] ) ) {
	if ( $_GET[ "op" ] == "featured" ) {
		$sql = "SELECT * FROM products,featured,sub_categories WHERE products.product_id = featured.product_id AND featured.active = 1 AND products.subc_id = sub_categories.subc_id";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );

		} catch ( Exception $e ) {
			echo - 1;
		}
	}
}

//get new products
if ( isset( $_GET[ "op" ] ) ) {
	if ( $_GET[ "op" ] == "newproducts" ) {
		$sql = "SELECT * FROM users WHERE u_birth >= DATE_ADD(NOW(), INTERVAL -2 MONTH) ORDER BY u_id DESC LIMIT 3";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );

		} catch ( Exception $e ) {
			echo - 1;
		}
	}
}
?>