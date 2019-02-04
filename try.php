<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
</head>

<body>
	<h1>
		<?php
		require_once( 'ws/DAL.class.php' );
		$sql = "SELECT * FROM products";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data[ 0 ] );

		} catch ( Exception $e ) {
			echo - 1;
		}

		?>
	</h1>
</body>
</html>