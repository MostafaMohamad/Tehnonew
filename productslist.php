<?php
include_once( "ws/DAL.class.php" );
session_start();
$sql = '';
$getresult = false;
$rec = false;
if ( isset( $_GET[ "op" ] ) ) {
	$sql = "";
	if ( $_GET[ "op" ] == "allproducts" ) {
		$sql = "SELECT * FROM products";
		$getresult = true;
	} else if ( $_GET[ "op" ] == "featured" ) {
		$sql = "SELECT * FROM products WHERE products.Featured = 1 GROUP BY featured_date DESC ";
		$getresult = true;

	} else if ( $_GET[ "op" ] == "newproducts" ) {
		$sql = "SELECT * FROM products WHERE product_added >= DATE_ADD(NOW(), INTERVAL -2 MONTH) ORDER BY product_id DESC";
		$getresult = true;
	} else if ( $_GET[ "op" ] == "recommended" ) {
		$rec = true;
	}
} else if ( isset( $_GET[ "keyword" ] ) ) {
	$sql = "SELECT * FROM products WHERE product_name LIKE '%" . $_GET[ "keyword" ] . "%' OR model_number LIKE '%" . $_GET[ "keyword" ] . "%' OR product_brand LIKE '%" . $_GET[ "keyword" ] . "%' OR products.subc_id IN (SELECT subc_id FROM sub_categories WHERE subc_name LIKE '%" . $_GET[ "keyword" ] . "%') ORDER BY product_added DESC ";
	$getresult = true;

} else if ( isset( $_GET[ "category" ] ) ) {
	$sql = "SELECT * FROM products WHERE products.subc_id = (SELECT subc_id FROM sub_categories WHERE sub_categories.subc_name = '" . $_GET[ "category" ] . "')";
	$getresult = true;
} else if ( isset( $_GET[ "mp" ] ) && isset( $_GET[ "os" ] ) && isset( $_GET[ "max-price" ] ) ) {
	$sql = "SELECT MAX(program_specs.cpu) AS 'cpu_max', MAX(program_specs.vram) AS 'vram_max',MAX(program_specs.ram) AS 'ram_max' FROM program_specs,programs,profession_major, pm_programs WHERE pm_programs.pm_id = (SELECT profession_major.pm_id WHERE profession_major.pm_name = '" . $_GET[ "mp" ] . "') AND pm_programs.prog_id = programs.prog_id AND programs.prog_id = program_specs.prog_id";
	if ( $_GET[ "os" ] == 'Windows' || $_GET[ "os" ] == 'macOS' ) {
		$sql .= " AND program_specs.os_type = '" . $_GET[ "os" ] . "'";
	}
	try {
		$db = new DAL();
		$data = $db->getData( $sql );
		if ( !empty( $data[ 0 ][ "cpu_max" ] ) ) {
			$getresult = true;
			$sql = "SELECT * FROM products WHERE products.product_id IN (SELECT pdt_specs.product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'CPU Clock Speed') AND value >= " . $data[ 0 ][ "cpu_max" ] . " AND product_id IN (SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'ram') AND value >= " . $data[ 0 ][ "ram_max" ] . " AND product_id IN(SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'vram') AND value >= " . $data[ 0 ][ "vram_max" ];
			if ( $_GET[ "os" ] == 'Windows' || $_GET[ "os" ] == 'macOS' ) {
				$sql .= " AND product_id IN (SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'os') AND value LIKE  '%" . $_GET[ "os" ] . "%' )";
			}
			$sql .= "))) AND products.subc_id IN (SELECT sub_categories.subc_id FROM sub_categories WHERE sub_categories.category_id = (SELECT categories.category_id FROM categories WHERE categories.category_name = 'computers')) AND products.product_price <= ";
			if ( empty( $_GET[ "max-price" ] ) ) {
				$sql .= " (SELECT MAX(products.product_price) FROM products)";
			} else if ( $_GET[ "max-price" ] > 0 ) {
				$sql .= $_GET[ "max-price" ];
			}
		} else {
			$getresult = false;

			header( "Refresh:0; url='search-for-pc.php'" );
		}

	} catch ( Exception $e ) {
		echo( $e );
	}
} else if ( isset( $_GET[ "programs" ] ) && isset( $_GET[ "os" ] ) && isset( $_GET[ "max-price" ] ) ) {
	$progList = explode( ",", $_GET[ "programs" ] );
	$progs = "";
	for ( $i = 0; $i < count( $progList ); $i++ ) {
		$progs .= "'" . $progList[ $i ] . "',";
	}
	$qryProg = substr( $progs, 0, -1 );

	$sql = "SELECT MAX(program_specs.cpu) AS 'cpu_max', MAX(program_specs.vram) AS 'vram_max',MAX(program_specs.ram) AS 'ram_max' FROM program_specs,programs WHERE program_specs.prog_id IN (SELECT programs.prog_id FROM programs WHERE programs.prog_name IN (" . $qryProg . ")) AND programs.prog_id = program_specs.prog_id";
	if ( $_GET[ "os" ] == "Windows" || $_GET[ "os" ] == "macOS" ) {
		$sql .= " AND program_specs.os_type = '" . $_GET[ "os" ] . "'";
	}

	try {
		$db = new DAL();
		$data = $db->getData( $sql );

		if ( !empty( $data[ 0 ][ "cpu_max" ] ) ) {
			$getresult = true;
			$sql = "SELECT * FROM products WHERE products.product_id IN (SELECT pdt_specs.product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'CPU Clock Speed') AND value >= " . $data[ 0 ][ "cpu_max" ] . " AND product_id IN (SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'ram') AND value >= " . $data[ 0 ][ "ram_max" ] . " AND product_id IN(SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'vram') AND value >= " . $data[ 0 ][ "vram_max" ];
			if ( $_GET[ "os" ] == 'Windows' || $_GET[ "os" ] == 'macOS' ) {
				$sql .= " AND product_id IN (SELECT product_id FROM pdt_specs WHERE spec_id = (SELECT specifications.spec_id FROM specifications WHERE specifications.spec_name = 'os') AND value LIKE '%" . $_GET[ "os" ] . "%' )";
			}
			$sql .= "))) AND products.subc_id IN (SELECT sub_categories.subc_id FROM sub_categories WHERE sub_categories.category_id = (SELECT categories.category_id FROM categories WHERE categories.category_name = 'computers')) AND products.product_price <= ";
			if ( empty( $_GET[ "max-price" ] ) ) {
				$sql .= " (SELECT MAX(products.product_price) FROM products)";
			} else if ( $_GET[ "max-price" ] > 0 ) {
				$sql .= $_GET[ "max-price" ];
			}
		} else {
			$getresult = false;

			header( "Refresh:0; url='search-for-pc.php'" );
		}

	} catch ( Exception $e ) {
		echo( $e );
	}

} else {
	include( "ws/404-notfound.php" );
}

if ( !empty( $sql ) && $getresult ) {

	try {
		$db = new DAL();
		$data = $db->getData( $sql );
		if ( $data != null ) {
			$s = "";
			for ( $i = 0; $i < count( $data ); $i++ ) {
				$qty = "SELECT COUNT(*)AS 'qty' FROM inventory WHERE inventory.p_id = '" . $data[ $i ][ "product_id" ] . "' AND status='available'";
				$dbq = new DAL();
				$qtyData = $dbq->getData( $qty );
				$pdtQty = $qtyData[ 0 ][ "qty" ];
				if ( $pdtQty != 0 ) {


					$lst = '<div class="col-lg-3 col-md-4 col-sm-6">
			<div class="items col-xs-12">
			<h5>' . $data[ $i ][ "product_brand" ] . '</h5>
			<h5><strong>' . $data[ $i ][ "product_name" ] . '</strong></h5>
			<a href="product-details.php?pid=' . $data[ $i ][ "product_id" ] . '"><img class="img-responsive img-home-portfolio" src="img/products/' . $data[ $i ][ "product_name" ] . $data[ $i ][ "model_number" ] . '/' . $data[ $i ][ "product_image" ] . '"></a>
			<div class="prices">
			<h4 class = "col-xs-6" > ' . $data[ $i ][ "product_price" ] . ' &#36; </h4>
			<h4 class= "col-xs-6" >Qty: ' . $pdtQty . '<a href = "cart-mgmt.php?pid=' . $data[ $i ][ "product_id" ] . '" class="pull-right"> <span class = "fas fa-cart-plus" > </span></a> </h4>
			</div></div></div>';
					$s .= $lst;
				}
			}
		}
	} catch ( Exception $e ) {
		echo $e;
	}
}

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Style css -->
	<link href="css/style.css" type="text/css" rel="stylesheet">

	<!-- jQuery library -->
	<script src="js/jquery-3.3.1.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<title>Technonew</title>
	<link type="text/css" rel="stylesheet" href="css/all.min.css">
</head>

<body>
	<?php
	include( "nav-tools.php" );
	TopPage( false );
	?>

	<div class="section">
		<div class="container">
			<p>
				<h2>
					<?php
					if ( isset( $_GET[ "op" ] ) ) {
						switch ( $_GET[ "op" ] ) {

							case "featured":
								echo( "Featured Products" );
								break;
							case "newproducts":
								echo( "New Products" );
								break;
							case "recommended":
								echo( "Recommended For You" );
								break;
							default:
								echo( "Products" );
						}
					} else if ( isset( $_GET[ "category" ] ) ) {
						echo( $_GET[ "category" ] );
					} else if ( isset( $_GET[ "keyword" ] ) ) {
						echo( 'Searh result for "' . $_GET[ "keyword" ] . '"' );
					}

					?>
				</h2>
			</p>
			<div class="row ftrd">
				<div id="product-list">
					<?php if(!empty($s)){echo($s);} 
					if($rec){
	include('ws/ws_recommended.php');
		GetRecommended(true);
}
					?> </div>
			</div>
			<!-- /.row -->
			<br>
			<hr class="col-xs-6 col-xs-offset-3" style="border-top: 1px solid #d50000 !important;">
			<br>
			<br>
			<br>
			<br>
		</div>
	</div>

</body>
<div class="container">
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
					<ul class="adress">
						<span>Address</span>
						<li>
							<p>Tripoli - Tal - Arab Bank Building</p>
						</li>
						<li>
							<p>06/123456</p>
						</li>
						<li>
							<p>info@technonew.com</p>
						</li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<ul class="contact">
						<span>Pages</span>
						<li><a href="#">Home</a>
						</li>
						<li><a href="#">Products</a>
						</li>
						<li><a href="#">Find your PC</a>
						</li>
						<li><a href="#">Contact-US</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
					<ul class="social">
						<span>Social</span>
						<li><a href="#"><i class="fab fa-facebook fa-2x"></i></a>
						</li>
						<li><a href="#"><i class="fab fa-instagram fa-2x"></i></a>
						</li>
						<li><a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
						</li>
						<li><a href="#"><i class="fab fa-twitter fa-2x"></i></a>
						</li>
						<li><a href="#"><i class="fab fa-google-plus fa-2x"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
</div>
<script src="js/tools.js"></script>
<script src="js/globals.js"></script>
</html>