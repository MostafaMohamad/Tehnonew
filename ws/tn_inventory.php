<?php
header( 'Access-Control-Allow-Origin: *' );
require_once( 'DAL.class.php' );

if ( isset( $_GET[ "op" ] ) ) {
	//get user credentials
	if ( $_GET[ "op" ] == "login" ) {
		if ( isset( $_GET[ "uemail" ] ) && isset( $_GET[ "upass" ] ) ) {
			$encpass = $_GET[ "upass" ];
			$sql = "SELECT * FROM users WHERE user_password ='" . $encpass . "' AND user_username ='" . $_GET[ "uuname" ] . "'OR user_email = '" . $_GET[ "uemail" ] . "' AND user_password='" . $encpass . "'";
			try {
				$db = new DAL();
				$data = $db->getData( $sql );

				header( "Content-type:application/json" );
				if ( $data != null ) {
					echo($data[ 0 ][ "user_type" ]);
				}

			} catch ( Exception $e ) {
				echo - 1;
			}
		}
	}
	//Check Serial Number
	else if ( $_GET[ "op" ] == "check-sn" ) {
		$sql = "SELECT * FROM inventory WHERE SN = '" . $_GET[ "sn" ] . "' AND p_id='".$_GET["pid"]."'";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			header( "Content-type:application/json" );
			if (empty($data)) {
				echo( 0 );
			} else if ( count( $data ) > 0 ) {
				echo( 1 );
			}

		} catch ( Exception $e ) {
			echo - 1;
		}

	}
	//get products list for inventory
	else if ( $_GET[ "op" ] == "inv-pdt" ) {
		$sql = "SELECT product_id,product_name,model_number,product_price FROM products";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );

		} catch ( Exception $e ) {
			echo - 1;
		}

	}
	
	//Add item to inventory
	else if ( $_GET[ "op" ] == "inv-add-item" ) {
		$sql = "INSERT INTO inventory (p_id, SN, warranty_end,status) VALUES ('" . $_GET[ "pid" ] . "','" . $_GET[ "sn" ] . "','" . $_GET[ "wed" ] . "','available')";

		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );
			echo( $data );

		} catch ( Exception $e ) {
			echo - 1;
		}

	}
}
?>