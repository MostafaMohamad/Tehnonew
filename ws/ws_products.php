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
	} else if ( $_GET[ "op" ] == "featured" ) {
		$sql = "SELECT * FROM products WHERE products.Featured = 1 GROUP BY featured_date DESC LIMIT 4";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );

		} catch ( Exception $e ) {
			echo - 1;
		}
	}

	//get new products
	else if ( $_GET[ "op" ] == "newproducts" ) {
		$sql = "SELECT * FROM products WHERE product_added >= DATE_ADD(NOW(), INTERVAL -2 MONTH) ORDER BY product_id DESC LIMIT 4";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );

		} catch ( Exception $e ) {
			echo - 1;
		}
	}

	//get sub-cat
	else if ( $_GET[ "op" ] == "subcat" ) {
		$sql = "SELECT subc_name FROM sub_categories WHERE sub_categories.category_id = (SELECT category_id FROM categories WHERE categories.category_name = '".$_GET["catname"]."') ORDER BY subc_name";

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