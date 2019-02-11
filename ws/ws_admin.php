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
			echo json_encode( $data );
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
		$nkey = array_keys( $names );
		$values = $_GET[ "Svalues" ];
		$vkey = array_keys( $values );
		$specs_nb = count( $names );
		$val = "";
		for ( $i = 0; $i < $specs_nb; $i++ ) {
			$val .= "("
				. "'" . $_GET[ "pid" ] . "',"
			. "(SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name='" . $names[ $nkey[ $i ] ] . "'),"
			. "'" . $values[ $vkey[ $i ] ] . "'),";
		}

		$qry = substr( $val, 0, -1 );

		$sql = "INSERT INTO pdt_specs (product_id, spec_id, value) VALUES " . $qry;
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
		$sql = "UPDATE products SET featured_date = CURRENT_TIMESTAMP, Featured = '1' WHERE model_number='" . $_GET[ "pmodel" ] . "'";
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
		$sql = "UPDATE products SET  Featured = '0' WHERE model_number='" . $_GET[ "pmodel" ] . "'";
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
		$nkey = array_keys( $names );
		$specs_nb = count( $names );
		$val = "";
		for ( $i = 0; $i < 4; $i++ ) {
			$val .= "'" . $names[ $nkey[ $i ] ] . "',";
		}

		$qry = substr( $val, 0, -1 );

		$sql = "INSERT INTO product_images  VALUES ('" . $_GET[ "pid" ] . "'," . $qry . ")";
		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			echo - 1;
		}

	}

	//Edit spec
	else if ( $_GET[ "op" ] == "editspec" ) {
		$sql = "UPDATE specifications  SET spec_name = '" . $_GET[ "sname" ] . "' WHERE specifications.spec_id = '" . $_GET[ "sid" ] . "'";
		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			echo - 1;
		}

	}

	//Add spec
	else if ( $_GET[ "op" ] == "addspec" ) {
		$sql = "INSERT INTO specifications  (spec_name) VALUES ('" . $_GET[ "sname" ] . "')";
		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );

			header( "Content-type:application/json" );
			echo json_encode( $data );
		} catch ( Exception $e ) {
			echo - 1;
		}

	}

	//Add Software
	else if ( $_GET[ "op" ] == "addprog" ) {
		$sql = "INSERT INTO programs (prog_name,prog_image,prog_details) VALUES ('" . $_GET[ "pname" ] . "','" . $_GET[ "pimage" ] . "','" . $_GET[ "pdetails" ] . "')";
		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );

			echo( $data );

		} catch ( Exception $e ) {
			echo - 1;
		}

	}
	//Assign specs to Software
	else if ( $_GET[ "op" ] == "progspecs" ) {
		$sql = "INSERT INTO program_specs (prog_id, cpu, multicore,	vram, ram, os_type, is64) VALUES ('" . $_GET[ "prog_id" ] . "','" . $_GET[ "cpu" ] . "','" . $_GET[ "mcore" ] . "','" . $_GET[ "gpu" ] . "','" . $_GET[ "ram" ] . "','" . $_GET[ "os" ] . "','" . $_GET[ "osv" ] . "')";
		try {
			$db = new DAL();
			$data = $db->ExecuteQuery( $sql );

			echo( $data );

		} catch ( Exception $e ) {
			echo - 1;
		}

	}

	//Get all programs names
	else if ( $_GET[ "op" ] == "getallprog" ) {
		$sql = "SELECT * FROM programs";
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

//SELECT MAX(program_specs.cpu) AS "cpu_max", MAX(program_specs.vram) AS "vram_max",MAX(program_specs.ram) AS "ram_max" FROM program_specs,programs,profession_major, pm_programs WHERE pm_programs.pm_id = (SELECT profession_major.pm_id WHERE profession_major.pm_name = "computer science") AND pm_programs.prog_id = programs.prog_id AND programs.prog_id = program_specs.prog_id AND program_specs.os_type = 'macos' 

//SELECT * FROM products,pdt_specs,specifications WHERE products.product_id = pdt_specs.product_id AND pdt_specs.spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = "cpu") AND pdt_specs.spec_id = specifications.spec_id AND pdt_specs.value = "7700 HQ" 

//SELECT pdt_specs.product_id FROM `pdt_specs` WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'cpu') AND value > 2 AND product_id IN (SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'ram') AND value > 2 AND product_id IN(SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'vram') AND value > 4))

//SELECT * FROM products WHERE products.product_id IN (SELECT pdt_specs.product_id FROM `pdt_specs` WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'cpu') AND value >= 2 AND product_id IN (SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'ram') AND value >= 2 AND product_id IN(SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'vram') AND value >= 4))) AND products.subc_id IN (SELECT sub_categories.subc_id FROM sub_categories WHERE sub_categories.category_id = (SELECT categories.category_id FROM categories WHERE categories.category_name = "computers")) AND products.product_price <= 1000
//SELECT MAX(program_specs.cpu) AS "cpu_max", MAX(program_specs.vram) AS "vram_max",MAX(program_specs.ram) AS "ram_max" FROM program_specs WHERE program_specs.program_specs_id IN (SELECT program_specs.program_specs_id FROM programs,program_specs WHERE programs.prog_name IN ("photoshop","adobe illustrator") AND programs.prog_id = program_specs.prog_id AND program_specs.os_type = "windows") 


/*algo
SELECT * FROM products WHERE products.product_id IN (SELECT pdt_specs.product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'cpu') AND value >= " . $data[ 0 ][ "cpu_max" ] . " AND product_id IN (SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'ram') AND value >= " . $data[ 0 ][ "ram_max" ] . " AND product_id IN(SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'vram') AND value >= " . $data[ 0 ][ "vram_max" ] . " AND product_id IN (SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'os') AND value = '".$_GET["os"]."' ) ))) AND products.subc_id IN (SELECT sub_categories.subc_id FROM sub_categories WHERE sub_categories.category_id = (SELECT categories.category_id FROM categories WHERE categories.category_name = 'mobile phones')) AND products.product_price <= */
?>