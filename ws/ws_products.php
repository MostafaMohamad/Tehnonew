<?php 
header( 'Access-Control-Allow-Origin: *' );
require_once( 'DAL.class.php' );

if ( isset( $_GET[ "op" ] ) ) {
	//get user credentials
	if ( $_GET[ "op" ] == "allproducts" ) {
			$sql = "SELECT * FROM products";

			try {
				$db = new DAL();
				$data = $db->getData( $sql );

				header( "Content-type:application/json" );
				echo json_encode($data);

			} catch ( Exception $e ) {
				echo - 1;
			}
		
	}
}
?>