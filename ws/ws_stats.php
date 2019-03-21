<?php
header( 'Access-Control-Allow-Origin: *' );
require_once( 'DAL.class.php' );

if ( isset( $_GET[ "op" ] ) ) {
	//Get Users Stats
	if ( $_GET[ "op" ] == 'user-month' ) {
		$sql = "SELECT COUNT(*) AS 'total',MONTH(registered_at) AS 'month' FROM users WHERE YEAR(registered_at) = '".$_GET["year"]."' GROUP BY  MONTH(registered_at)";
	
		}
		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			echo $e;
		}

	}

?>