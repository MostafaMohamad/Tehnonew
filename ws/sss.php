<?php
require_once( 'DAL.class.php' );
//get all products
if ( isset( $_GET[ "op" ] ) ) {
	if ( $_GET[ "op" ] == "allproducts" ) {
		$sql = "SELECT * FROM products";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

		} catch ( Exception $e ) {
			echo - 1;
		}
	}
}

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1><?php echo ( $data[ 0 ][ 'product_name' ] ); ?></h1>
</body>
</html>