<?php 
include("cart-mgmt.php");
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
	TopPage(false);
	?>
	<div class="container">
		<div class="card">
			<div class="card-header bg-dark text-light">
				<i class="fas fa-shopping-cart" style ="color: #d50000;" aria-hidden="true"></i><span style="font-size: 16px;"> Shopping Cart</span>  
				<div class="clearfix"></div>
			</div>
			</br>
			<div class="card-body">
				
						<?php 
				GetCartItems();
						
						?>
					
				
			</div>
			
		</div>
	</div>
</body>
<script src="js/tools.js"></script>
<script src="js/globals.js"></script>
<script src="js/cart.js"></script>
</html>