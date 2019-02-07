<?php
include_once( "ws/DAL.class.php" );

if ( isset( $_GET[ "pid" ] ) ) {
	$sql = "SELECT * FROM products WHERE products.product_id = '" . $_GET[ 'pid' ] . "'";
	try {
		$db = new DAL();
		$data = $db->getData( $sql );
		if ( empty( $data ) ) {
			include( "ws/404-notfound.php" );
		}


	} catch ( Exception $e ) {
		echo - 1;
	}

} else {
	include( "ws/404-notfound.php" );
}





?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Style css -->
	<link href="css/style.css" type="text/css" rel="stylesheet">

	<!-- jQuery library -->
	<script src="js/jquery-3.3.1.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<link type="text/css" rel="stylesheet" href="css/all.min.css">
	<link type="text/css" rel="stylesheet" href="css/lightbox.css">
	<script src="js/lightbox.js"></script>
	<title>Product | Details</title>
</head>

<body>
	<?php   
	include("nav-tools.php");
	
	
	
	?>
	<div class="container">

		<div  style ="border:0.1px  solid #D50000;"class="col-xs-12 col-sm-6 text-center" id="images">
			<?php 
		include_once("ws/DAL.class.php");
			
		$sql = "SELECT * FROM products WHERE products.product_id = '".$_GET['pid']."'";
			$location="";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			
			if(!empty($data) ){
				$location= "img/products/".$data[0]['product_name'].$data[0]['model_number']."/";
				
				echo('<a href="img/products/'.$data[0]["product_name"].$data[0]["model_number"].'/'.$data[0]["product_image"].'" data-lightbox="roadtrip">
		  <img style="width:500px; height:500px;" class="img-responsive img-home-portfolio" src="img/products/'.$data[0]["product_name"].$data[0]["model_number"].'/'.$data[0]["product_image"].'"></a>');
			
			}
		} catch ( Exception $e ) {
			echo - 1;
		}	
		
		
		
		
		?>





			<div class="col-xs-12">
				<?php


				include_once( "ws/DAL.class.php" );
				$sql = "SELECT * FROM product_images WHERE product_id = '" . $_GET[ 'pid' ] . "'";

				try {
					$db = new DAL();
					$data = $db->getData( $sql );

					if ( !empty( $data ) ) {
						for ( $i = 1; $i < 5; $i++ ) {
							if ( !empty( $data[ 0 ][ "img" . $i ] ) ) {
								echo( '<a href="' . $location . $data[ 0 ][ "img" . $i ] . '" data-lightbox="roadtrip">
			<img style="width: 96px; height: 96px; display: inline;" class="img-responsive img-home-portfolio" src="' . $location . $data[ 0 ][ "img" . $i ] . '"> 
		</a>' );
							}
						}


					}
				} catch ( Exception $e ) {
					echo - 1;
				}





				?>









			</div>
		</div>
		<div class="col-md-6">
			<?php 
			include_once("ws/DAL.class.php");
			$sql = "SELECT * FROM products WHERE products.product_id = '".$_GET['pid']."'";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			if($data != null){
				echo("<h1>".$data[0]['product_name']."</h1><h5 style = ' font-size : 14px;color: #D50000;'>Model: ".$data[0]['model_number']."</h5><hr>");
			}
			
			
		} catch ( Exception $e ) {
			echo - 1;
		}
			
		$sql = "SELECT specifications.spec_name, pdt_specs.value FROM specifications,pdt_specs WHERE pdt_specs.product_id = '".$_GET["pid"]."' AND pdt_specs.spec_id = specifications.spec_id ";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			
			if(count($data) > 0 ){
				echo("<h3><b>Product details</b></h3><ul>");
				for($i = 0 ; $i < count($data) ; $i++){
					echo( "<li  class= 'lired' style = 'font-size : 18px;'><b style = 'color:#D50000;' >".$data[$i]["spec_name"].":</b> ".$data[$i]["value"]."</li>");
				}
				echo("</ul>");
			}
		} catch ( Exception $e ) {
			echo - 1;
		}	
			?>

		</div>
	</div>
</body>
<script src="js/tools.js"></script>
	<script src="js/globals.js"></script>
</html>