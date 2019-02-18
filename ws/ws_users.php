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
				echo json_encode( $data[ 0 ] );

				if ( $data != null ) {
					session_start();
					$_SESSION[ "uid" ] = $data[ 0 ][ "user_id" ];
					$_SESSION[ "uname" ] = $data[ 0 ][ "user_username" ];
					$_SESSION[ "utype" ] = $data[ 0 ][ "user_type" ];
				}

			} catch ( Exception $e ) {
				echo - 1;
			}
		}
	}


	//check username availability
	else if ( $_GET[ "op" ] == "availability" ) {

		$sql = "SELECT * FROM users WHERE user_username='" . $_GET[ "uuname" ] . "'";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			if ( empty( $data ) ) {
				echo( "0" );
			} else if ( count( $data ) > 0 ) {
				echo( "1" );
			} else {
				echo( "-1" );
			}

		} catch ( Exception $e ) {
			echo - 1;
		}

	}
	//check email availability
	else if ( $_GET[ "op" ] == "eavailability" ) {

		$sql = "SELECT * FROM users WHERE user_email='" . $_GET[ "uemail" ] . "'";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			if ( empty( $data ) ) {
				echo( "0" );
			} else if ( count( $data ) > 0 ) {
				echo( "1" );
			} else {
				echo( "-1" );
			}

		} catch ( Exception $e ) {
			echo - 1;
		}

	}

	//Insert new user
	else if ( $_GET[ "op" ] == "register" ) {

		$sql = "INSERT INTO  users (user_fullname,user_username,user_dob,user_email,user_gender,user_type,user_password,
		user_status) VALUES('" . $_GET[ "ufname" ] . "','" . $_GET[ "uuname" ] . "','" . $_GET[ "udob" ] . "','" . $_GET[ "uemail" ] . "','" . $_GET[ "ugender" ] . "','" . $_GET[ "utype" ] . "','" . $_GET[ "upass" ] . "','" . $_GET[ "ustatus" ] . "')";

		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );


			if ( empty( $data ) ) {
				echo( "0" );
			} else if ( !empty( $data ) ) {
				echo( $data );
				session_start();
				$_SESSION[ "uid" ] = $data;
				$_SESSION[ "uname" ] = $_GET[ "uuname" ];
				$_SESSION[ "utype" ] = $_GET[ "utype" ];

			} else {
				echo( "-1" );
			}

		} catch ( Exception $e ) {
			echo - 1;
		}

	}


	//Get user by username
	else if ( $_GET[ "op" ] == "userProfile" ) {

		$sql = "SELECT * FROM users WHERE user_username='" . $_GET[ "uuname" ] . "'";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );

			echo json_encode( $data[ 0 ] );

		} catch ( Exception $e ) {
			echo - 1;
		}

	}

	//Update Info
	else if ( $_GET[ "op" ] == "profileUpdate" ) {

		$sql = "UPDATE users SET user_fullname = '" . $_GET[ "uname" ] . "',user_address = '" . $_GET[ "uaddress" ] . "',user_phone = '" . $_GET[ "uphone" ] . "' WHERE user_username = '" . $_GET[ "uuname" ] . "'";

		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );

			header( "Content-type:application/json" );

			echo json_encode( $data[ 0 ] );

		} catch ( Exception $e ) {
			echo - 1;
		}

	}

	//change password
	else if ( $_GET[ "op" ] == "changePass" ) {

		$sql = "UPDATE users SET user_password = '" . $_GET[ "upass" ] . "' WHERE user_username = '" . $_GET[ "uuname" ] . "'";

		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );

			header( "Content-type:application/json" );

			echo json_encode( $data[ 0 ] );

		} catch ( Exception $e ) {
			echo - 1;
		}

	}

	//Add keyword
	else if ( $_GET[ "op" ] == "addkeyword" ) {
		session_start();
		if ( isset( $_SESSION[ "uid" ] ) ) {
			$sql = "INSERT INTO recommended (user_id,keyword) VALUES ('" . $_SESSION[ "uid" ] . "', '" . $_GET[ "keyword" ] . "')";

			try {
				$db = new DAL();
				$data = $db->ExecuteQuery( $sql );
			} catch ( Exception $e ) {
				echo $e;
			}

		}
	}






}

?>