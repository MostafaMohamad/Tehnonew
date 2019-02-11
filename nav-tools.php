<?php
include_once( "ws/DAL.class.php" );

/*if ( isset( $_GET[ "pid" ] ) ) {
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
}*/
echo('<header id="header" role="banner">
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
						<li><a href="cart.php"><span class="fas fa-shopping-cart"></span><span class="badge">5</span> Cart </a> </li>
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
			<span class="btn input-group-addon right-addon" id="search-btn"><i class="fas fa-search"></i> </span>
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
	</div>')





?>