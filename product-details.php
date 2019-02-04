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
	<header id="header" role="banner">
		<div class="container">
			<div id="navbar" class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".mainnav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<a class="navbar-brand" href="index.php">TECHNONEW</a> </div>
				<div class="collapse navbar-collapse mainnav">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown hidden-md hidden-lg hidden-sm"> <a class="dropdown" data-toggle="dropdown" href="#"><span class="fas fa-list-ol"></span> Categories <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Computers</a>
								</li>
								<li><a href="#">Computer Parts</a>
								</li>
								<li><a href="#">Computer Accessories</a>
								</li>
								<li><a href="#">Mobile Phones</a>
								</li>
								<li><a href="#">Mobile Accessories</a>
								</li>
								<li><a href="#">Electronics</a>
								</li>
							</ul>
						</li>
						<li><a href="#"><span class="fas fa-shopping-cart"></span> Cart</a> </li>
						<li><a href="register.html"><span class="fas fa-user-plus"></span> Sign Up</a> </li>
						<li><a href="login.html"><span class="fas fa-sign-in-alt"></span> Login</a> </li>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<!--/#header-->
	<div class="container ">
		<button class="btn btn-default col-lg-4 col-sm-4 col-md-4 col-xs-12">Search for a PC</button>
		<div class="col-xs-4"><br>
		</div>
		<div class="input-group pull-right col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<input type="text" class="form-control" placeholder="Search">
			<div class="input-group-btn">
				<button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-search"></i> </button>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="navbar navbar-default hidden-xs">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".ctg"> <span class="sr-only">Toggle navigation</span> <span class="fa fa-caret-square-down"></span></button>
			</div>
			<div class="collapse navbar-collapse ctg">
				<ul class="nav navbar-nav" id="categories">
					<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Computers <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Page 1-1</a>
							</li>
							<li><a href="#">Page 1-2</a>
							</li>
							<li><a href="#">Page 1-3</a>
							</li>
						</ul>
					</li>
					<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Computer Parts <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Page 1-1</a>
							</li>
							<li><a href="#">Page 1-2</a>
							</li>
							<li><a href="#">Page 1-3</a>
							</li>
						</ul>
					</li>
					<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Computer Accessories<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Page 1-1</a>
							</li>
							<li><a href="#">Page 1-2</a>
							</li>
							<li><a href="#">Page 1-3</a>
							</li>
						</ul>
					</li>
					<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mobile Phones<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Page 1-1</a>
							</li>
							<li><a href="#">Page 1-2</a>
							</li>
							<li><a href="#">Page 1-3</a>
							</li>
						</ul>
					</li>
					<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mobile Accessories <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Page 1-1</a>
							</li>
							<li><a href="#">Page 1-2</a>
							</li>
							<li><a href="#">Page 1-3</a>
							</li>
						</ul>
					</li>
					<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Electronics<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Page 1-1</a>
							</li>
							<li><a href="#">Page 1-2</a>
							</li>
							<li><a href="#">Page 1-3</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<hr class="hidden-xs">
	</div>
	<div class="container">
		
		<div class="col-xs-6 text-center" id="images">
			<?php 
		include_once("ws/DAL.class.php");
		$sql = "SELECT * FROM products WHERE products.product_id = '".$_GET['pid']."'";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			
			if(!empty($data) ){
				echo('<a href="img/products/'.$data[0]["product_name"].$data[0]["model_number"].'/'.$data[0]["product_image"].'" data-lightbox="roadtrip">
		  <img style="width:500px; height:500px;" class="img-responsive img-home-portfolio" src="img/products/'.$data[0]["product_name"].$data[0]["model_number"].'/'.$data[0]["product_image"].'"></a>');
			
			}
		} catch ( Exception $e ) {
			echo - 1;
		}	
		
		
		
		
		?>
		




			<div class="col-xs-12">
				<a href="img/Samsung-Galaxy-Note-9-PNG.png" data-lightbox="roadtrip">
			<img style="width: 96px; height: 96px; display: inline;" class="img-responsive img-home-portfolio" src="img/Samsung-Galaxy-Note-9-PNG.png"> 
		</a>
			




				<a href="img/Samsung-Galaxy-Note-9-PNG.png" data-lightbox="roadtrip">
			<img style="width: 96px; height: 96px; display: inline;" class="img-responsive img-home-portfolio" src="img/Samsung-Galaxy-Note-9-PNG.png"> 
		</a>
			




				<a href="img/Samsung-Galaxy-Note-9-PNG.png" data-lightbox="roadtrip">
			<img style="width: 96px; height: 96px; display: inline;" class="img-responsive img-home-portfolio" src="img/Samsung-Galaxy-Note-9-PNG.png">
		</a>
			




				<a href="img/Samsung-Galaxy-Note-9-PNG.png" data-lightbox="roadtrip">
			<img style="width: 96px; height: 96px; display: inline;" class="img-responsive img-home-portfolio" src="img/Samsung-Galaxy-Note-9-PNG.png">
		</a>
			




			</div>
		</div>
		<div class="col-md-6">
			<?php 
			include_once("ws/DAL.class.php");
			$sql = "SELECT products.product_name FROM products WHERE products.product_id = '".$_GET['pid']."'";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			if($data != null){
				echo("<h1>".$data[0]['product_name']."</h1><hr><br><br><br>");
			}
			
			
		} catch ( Exception $e ) {
			echo - 1;
		}
			
		$sql = "SELECT specifications.spec_name, pdt_specs.value FROM specifications,pdt_specs WHERE pdt_specs.product_id = '".$_GET["pid"]."' AND pdt_specs.spec_id = specifications.spec_id ";

		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			
			if(count($data) > 0 ){
				echo("<h4><b>Product details</b></h4><ul>");
				for($i = 0 ; $i < count($data) ; $i++){
					echo( "<li><b>".$data[$i]["spec_name"].":</b> ".$data[$i]["value"]."</li>");
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
</html>