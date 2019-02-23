<?php
include_once( "ws/DAL.class.php" );
session_start();
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
		include('nav-tools.php'); 
	 	TopPage(true);
	?>
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
			<?php
				include('ws/ws_recommended.php');
				GetRecommended(false);
			?>
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
<script src="js/globals.js"></script>
</html>