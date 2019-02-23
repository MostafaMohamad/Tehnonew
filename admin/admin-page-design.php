<?php

function TopPage() {
	?>
	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../css/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../css/all.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php }
function page() {
	?>
	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a class="navbar-brand" href="index.php">Technonew Admin</a> </div>
		<!-- /.navbar-header -->

		<ul class="nav navbar-top-links navbar-right">
			<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
				<ul class="dropdown-menu dropdown-messages">
				</ul>
				<!-- /.dropdown-messages -->
			</li>
			<!-- /.dropdown -->
			<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
				<ul class="dropdown-menu dropdown-tasks">
				</ul>
				<!-- /.dropdown-tasks -->
			</li>
			<!-- /.dropdown -->
			<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
				<ul class="dropdown-menu dropdown-alerts">
				</ul>
				<!-- /.dropdown-alerts -->
			</li>
			<!-- /.dropdown -->
			<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a> </li>
					<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a> </li>
					<li class="divider"></li>
					<li><a href="../login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->

		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					<li> <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a> </li>
					<li> <a href="products.php?op=products"><i class="fas fa-boxes"></i> Products</a> </li>
					<li> <a href="inventory.php"><i class="fas fa-warehouse"></i> Inventory</a> </li>
					<li> <a href="users.php"><i class="fas fa-users"></i> Users</a> </li>
					<li> <a href="#"><i class="fas fa-chart-line"></i> Statistics<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li> <a href="user-stats.php"> Users statistics</a> </li>
							<li> <a href="product-stats.php"> Products statistics</a> </li>
							<li> <a href="search-stats.php"> Search statistics</a> </li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li> <a href="#"><i class="fas fa-globe"></i> Website managment<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li> <a href="categories-mgmt.php">Categories</a> </li>
							<li> <a href="specs-mgmt.php">Specifications</a> </li>
							<li> <a href="software-mgmt.php?programs=all">Softwares</a> </li>
							<li> <a href="profession-major.php">Professions and Majors</a> </li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>
		<!-- /.navbar-static-side -->
	</nav>
	<?php
}

function EndPage() {
	?>
	<!-- jQuery --> 
	<script src="../js/jquery-3.3.1.js"></script>

	<!-- Bootstrap Core JavaScript --> 
	<script src="../js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript --> 
	<script src="../js/metisMenu.min.js"></script>

	<!-- Custom Theme JavaScript --> 
	<script src="../js/sb-admin-2.js"></script>
	<?php
}
?>