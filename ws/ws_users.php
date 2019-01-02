<?php

header( 'Access-Control-Allow-Origin: *' );
require_once( 'DAL.class.php' );

if ( isset( $_GET[ "op" ] ) ) {
	//get user credentials
	if ( $_GET[ "op" ] == "login" ) {
		if ( isset( $_GET[ "uemail" ] ) && isset( $_GET[ "upass" ] ) ) {
			$sql = "SELECT * FROM users WHERE u_email ='" . $_GET[ "uemail" ] . "'AND u_password = '" . $_GET[ "upass" ] . "'";

			try {
				$db = new DAL();
				$data = $db->getData( $sql );

				header( "Content-type:application/json" );
				echo json_encode($data[0]);

			} catch ( Exception $e ) {
				echo - 1;
			}
		}
	}
}

?>