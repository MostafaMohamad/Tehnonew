<?php

include_once( "ws/DAL.class.php" );
$sql = "";

//switch ( $_GET[ "cat" ] ) {

//case "computers":
//echo( "test" );
//	break;

//}


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
		<div class="input-group col-xs-12 col-sm-4">
			<input id="search" type="text" class="form-control" name="search" placeholder="Search">
			<span class="btn input-group-addon right-addon"><i class="fas fa-search"></i> </span>
		</div>
	</div>
	<br>
	<div class="container">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active"> <a href="login.php"><img src="img/2.jpg" alt="Los Angeles" style="width:100%;"></a> </div>
				<div class="item"> <img src="img/1.jpg" alt="Chicago" style="width:100%;"> </div>
				<div class="item"> <img src="img/3.jpg" alt="New York" style="width:100%;"> </div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span> </a> </div>
		<hr>
	</div>
	<div class="container">
		<div class="navbar navbar-default hidden-xs">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".ctg"> <span class="sr-only">Toggle navigation</span> <span class="fa fa-caret-square-down"></span></button>
			</div>
			<div class="collapse navbar-collapse ctg">
				<ul class="nav navbar-nav" id="categories">
					<li class="dropdown"> <a class="dropdown-toggle cat"  data-toggle="dropdown" href="#">Computers <span class="caret"></span></a>
						<ul class="dropdown-menu">
							

						</ul>

					</li>
					<li class="dropdown"> <a class="dropdown-toggle cat" data-toggle="dropdown" id="comparts" href="#">Computer Parts <span class="caret"></span></a>
						<ul class="dropdown-menu">
							
						</ul>
					</li>
					<li class="dropdown"> <a class="dropdown-toggle cat" data-toggle="dropdown" href="#">Computer Accessories<span class="caret"></span></a>
						<ul class="dropdown-menu">
							

						</ul>
					</li>
					<li class="dropdown"> <a class="dropdown-toggle cat" data-toggle="dropdown" href="#">Mobile Phones<span class="caret"></span></a>
						<ul class="dropdown-menu">
							

						</ul>
					</li>
					<li class="dropdown"> <a class="dropdown-toggle cat" data-toggle="dropdown" href="#">Mobile Accessories <span class="caret"></span></a>
						<ul class="dropdown-menu">
							
						</ul>
					</li>
					<li class="dropdown"> <a class="dropdown-toggle cat" data-toggle="dropdown" href="#">Electronics<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<hr class="hidden-xs">
	</div>
	<div class="section">
		<div class="container">
			<p>
				<h2>Featured Products</h2>
				<a href="productslist.php?op=featured">View more <span class="fas fa-eye"></span></a>
			</p>
			<div class="row ftrd">
				<div id="product-list"> </div>
			</div>
			<!-- /.row -->
			<br>
			<hr class="col-xs-6 col-xs-offset-3" style="border-top: 1px solid #d50000 !important;">
			<br>
			<br>
			<h2>New Products</h2>
			<a href="productslist.php?op=newproducts">View more <span class="fas fa-eye"></span></a>
			<div class="row ftrd">
				<div id="new-list"></div>
			</div>
			<br>
			<hr class="col-xs-6 col-xs-offset-3" style="border-top: 1px solid #d50000 !important;">
			<br>
			<br>
			<h2>Recommended Products</h2>
			<a href="#">View more <span class="fas fa-eye"></span></a>
			<div class="row ftrd">
				<div class="col-lg-12 text-center"> </div>
				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="items col-xs-12">
						<h5>Category</h5>
						<h5><strong>Some text here about product</strong></h5>
						<a href="#"> <img class="img-responsive img-home-portfolio" src="img/mouse.png"> </a>
						<div class="prices">
							<h4 class="col-xs-4">450 &#36; </h4>
							<h4 class="col-xs-4"><s> 800 &#36;</s></h4>
							<h4 class="pull-right"><a href="#"><span class="fas fa-cart-plus"></span></a></h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="items col-xs-12">
						<h5>Category</h5>
						<h5><strong>Some text here about product</strong></h5>
						<a href="#"> <img class="img-responsive img-home-portfolio" src="img/Samsung-Galaxy-Note-9-PNG.png"> </a>
						<div class="prices">
							<h4 class="col-xs-4">450 &#36; </h4>
							<h4 class="col-xs-4"><s> 800 &#36;</s></h4>
							<h4 class="pull-right"><a href="#"><span class="fas fa-cart-plus"></span></a></h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="items col-xs-12">
						<h5>Category</h5>
						<h5><strong>Some text here about product</strong></h5>
						<a href="#"> <img class="img-responsive img-home-portfolio" src="img/iphone_Xs_64gb_gold_sku_header.png"> </a>
						<div class="prices">
							<h4 class="col-xs-4">450 &#36; </h4>
							<h4 class="col-xs-4"><s> 800 &#36;</s></h4>
							<h4 class="pull-right"><a href="#"><span class="fas fa-cart-plus"></span></a></h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="items col-xs-12">
						<h5>Category</h5>
						<h5><strong>Some text here about product</strong></h5>
						<a href="#"> <img class="img-responsive img-home-portfolio" src="img/gl73-1.png"> </a>
						<div class="prices">
							<h4 class="col-xs-4">450 &#36; </h4>
							<h4 class="col-xs-4"><s> 800 &#36;</s></h4>
							<h4 class="pull-right"><a href="#"><span class="fas fa-cart-plus"></span></a></h4>
						</div>
					</div>
				</div>
			</div>
			<hr>
		</div>
		<!-- /.container -->

	</div>
	<!-- /.section -->
	<div>
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
<script src="js/index.js"></script>
<script src="js/tools.js"></script>
</html>