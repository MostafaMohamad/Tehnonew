<?php
header( 'Access-Control-Allow-Origin: *' );
require_once( 'DAL.class.php' );

if ( isset( $_GET[ "op" ] ) ) {
	//Get sub categories
	if ( $_GET[ "op" ] == "subcname" ) {
		$sql = "SELECT subc_name FROM sub_categories, categories WHERE sub_categories.category_id = categories.category_id AND categories.category_name ='" . $_GET[ "ct_name" ] . "' ORDER BY subc_name";
		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			echo - 1;
		}

	}

	//Insert a new sub-category
	else if ( $_GET[ "op" ] == "addsubc" ) {
		$sql = "INSERT INTO sub_categories (category_id,subc_name) VALUES ((SELECT categories.category_id FROM categories WHERE categories.category_name = '" . $_GET[ "ct_name" ] . "'), '" . $_GET[ "sc_name" ] . "')";
		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			echo - 1;
		}

	}
	//Get all products
	else if ( $_GET[ "op" ] == "getpdts" ) {
		$sql = "SELECT * FROM products, sub_categories WHERE products.subc_id = sub_categories.subc_id";
		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data);
		} catch ( Exception $e ) {
			echo - 1;
		}

	}
	//Get all subcategories
	else if ( $_GET[ "op" ] == "getallsubc" ) {
		$sql = "SELECT subc_name FROM sub_categories ORDER BY subc_name";
		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			echo - 1;
		}

	}
	//Get all subcategories
	else if ( $_GET[ "op" ] == "getallspecs" ) {
		$sql = "SELECT spec_name FROM specifications ORDER BY spec_name";
		try {
			$db = new DAL();
			$data = $db->getData( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			echo - 1;
		}

	}

	//Insert new product
	else if ( $_GET[ "op" ] == "addpdt" ) {
		$sql = "INSERT INTO products (product_name, model_number, subc_id, product_price, product_image , product_brand, product_description,Featured,product_status) VALUES ('" . $_GET[ "pname" ] . "','" . $_GET[ "pmodel" ] . "',(SELECT subc_id from sub_categories WHERE subc_name= '" . $_GET[ "subc" ] . "'),'" . $_GET[ "pprice" ] . "','" . $_GET[ "pimage" ] . "','" . $_GET[ "pbrand" ] . "','" . $_GET[ "pdsc" ] . "',0,1)";
		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			echo - 1;
		}

	}
	//Add specs to product
	else if ( $_GET[ "op" ] == "addspecs" ) {
		$names = $_GET[ "Snames" ];
		$nkey  = array_keys($names);
		$values = $_GET[ "Svalues" ];
		$vkey = array_keys($values);
		$specs_nb = count( $names );
		$val = "";
		for ( $i = 0; $i < $specs_nb; $i++ ) {
			$val .= "("
			. "'".$_GET["pid"]."',"
			. "(SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name='".$names[$nkey[$i]]."'),"
			. "'".$values[$vkey[$i]]."'),";
		}
		
		$qry = substr($val,0,-1);
		
		$sql = "INSERT INTO pdt_specs (product_id, spec_id, value) VALUES ".$qry;
			try {
				$db = new DAL();
				$data = $db->ExecuteQuery( $sql );

				header( "Content-type:application/json" );
				echo json_encode( $data );
			} catch ( Exception $e ) {
				echo - 1;
			}

	}
	
	//Add product to featured
	else if ( $_GET[ "op" ] == "addtoftd" ) {
		$sql = "UPDATE products SET featured_date = CURRENT_TIMESTAMP, Featured = '1' WHERE model_number='".$_GET["pmodel"]."'";
		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			
		}

	}
	
	//Remove product from featured
	else if ( $_GET[ "op" ] == "rmftd" ) {
		$sql = "UPDATE products SET  Featured = '0' WHERE model_number='".$_GET["pmodel"]."'";
		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			
		}

	}
	
	//Add photos to product
	else if ( $_GET[ "op" ] == "pdtphotos" ) {
		$names = $_GET[ "names" ];
		$nkey  = array_keys($names);
		$specs_nb = count( $names );
		$val = "";
		for ( $i = 0; $i < 4; $i++ ) {
			$val .= "'".$names[$nkey[$i]]."',";
		}
		
		$qry = substr($val,0,-1);
		
		$sql = "INSERT INTO product_images  VALUES ('".$_GET["pid"]."',".$qry.")";
			try {
				$db = new DAL();
				$data = $db->ExecuteQuery( $sql );

				header( "Content-type:application/json" );
				echo json_encode( $data );
			} catch ( Exception $e ) {
				echo - 1;
			}

	}


}
?>