<?php

function TopPage( $carousel ) {
	include_once( "ws/DAL.class.php" );
	$items = '';
	if ( isset( $_SESSION[ "uid" ] ) ) {
		$sql = "SELECT COUNT(*) AS nb FROM products,cart WHERE products.product_id = cart.product_id AND cart.status = 'active' AND cart.user_id = '" . $_SESSION[ "uid" ] . "' ";
		try {
			$db = new DAL();
			$data = $db->getData( $sql );
			if ( !empty( $data ) ) {
				$items = $data[ 0 ][ "nb" ];
			}
		} catch ( Exception $e ) {
			echo - 1;
		}
	}
	$slider = " ";
	if ( $carousel ) {
		$slider = '<div class="container">
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
	</div>';
	}
	echo( '<header id="header" role="banner">
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
						</li>' );
	if ( !isset( $_SESSION[ "uid" ] ) ) {
		echo( '<li><a href="register.html"><span class="fas fa-user-plus"></span> Sign Up</a> </li>
			<li><a href="login.html"><span class="fas fa-sign-in-alt"></span> Login</a> </li>' );
	} else {
		echo('<li><a href="cart.php"><span class="badge" style="color:#d50000; background-color: #FFFFFF;">' . $items . '</span><span class="fas fa-shopping-cart"></span> Cart </a> </li>
		<li><a><span class="fas fa-user"></span> '.$_SESSION['uname'].'</a></li>
		<li><a href="ws/logout.php"><span class="fas fa-sign-out-alt"></span> Logout</a></li>');
	}
	echo( '</ul>
	</div>
	</div>
	</div>
	</header>

	<!--/#header-->
	<div class="container ">
		<a href="search-for-pc.php"><button class="btn btn-default col-lg-4 col-sm-4 col-md-4 col-xs-12" >Search for a PC <i class="fas fa-desktop"></i></button></a>
		<div class="col-xs-4"><br>
		</div>
		<div class="input-group col-xs-12 col-sm-4">
			<input id="search" type="text" class="form-control" name="search" placeholder="Search products &#40;name, model, brand&#41; ">
			<span class="btn input-group-addon right-addon" id="search-btn"><i class="fas fa-search"></i> </span>
		</div>
	</div>
	<br>' . $slider . '

	<div class="container">
		<div class="navbar navbar-default hidden-xs">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".ctg"> <span class="sr-only">Toggle navigation</span> <span class="fa fa-caret-square-down"></span></button>
			</div>
			<div class="collapse navbar-collapse ctg">
				<ul class="nav navbar-nav" id="categories">
					<li class="dropdown"> <a class="dropdown-toggle cat" data-toggle="dropdown" href="#">Computers <span class="caret"></span></a>
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
	' );
}
?>