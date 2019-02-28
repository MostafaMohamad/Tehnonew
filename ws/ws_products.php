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
		$sql = "SELECT * FROM products,inventory WHERE products.Featured = 1 AND inventory.p_id = products.product_id AND (SELECT COUNT(*) FROM inventory WHERE inventory.p_id = products.product_id) > 0 AND inventory.status = 'available' GROUP BY products.product_id ORDER BY featured_date DESC LIMIT 4";

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
		$sql = "SELECT * FROM products,inventory WHERE product_added >= DATE_ADD(NOW(), INTERVAL -2 MONTH) AND inventory.p_id = products.product_id AND (SELECT COUNT(*) FROM inventory WHERE inventory.p_id = products.product_id) > 0 AND inventory.status = 'available' GROUP BY products.product_id ORDER BY product_id DESC LIMIT 4";

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
		$sql = "SELECT subc_name FROM sub_categories WHERE sub_categories.category_id = (SELECT category_id FROM categories WHERE categories.category_name = '" . $_GET[ "catname" ] . "') ORDER BY subc_name";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );

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

	//get sub items from product
	else if ( $_GET[ "op" ] == "inv-subitems" ) {
		$sql = "SELECT * FROM `inventory` WHERE p_id ='" . $_GET[ "pid" ] . "' ORDER BY status";

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
}

?>