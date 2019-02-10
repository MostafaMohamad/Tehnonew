<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Technonew | Admin</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="css/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Admin CSS File -->
	<link href="css/admin.css" rel="stylesheet" type="text/css">

	<!-- Table pagination CSS -->
	<link href="css/datatables.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="admin.html">Technonew Admin</a> </div>
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
						<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="sidebar-search">
							<div class="input-group custom-search-form">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
              <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
              </span> </div>
							<!-- /input-group -->
						</li>
						<li> <a href="admin.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a> </li>
						<li> <a href="#"><i class="fas fa-boxes"></i> Products<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li> <a href="products.php">View all products</a>
								</li>
								<li> <a href="products.php#add_new">Add new</a> </li>
								<li> <a href="notifications.html">Notifications</a> </li>
								<li> <a href="typography.html">Typography</a> </li>
								<li> <a href="icons.html"> Icons</a> </li>
								<li> <a href="grid.html">Grid</a> </li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li> <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li> <a href="panels-wells.html">Panels and Wells</a> </li>
								<li> <a href="buttons.html">Buttons</a> </li>
								<li> <a href="notifications.html">Notifications</a> </li>
								<li> <a href="typography.html">Typography</a> </li>
								<li> <a href="icons.html"> Icons</a> </li>
								<li> <a href="grid.html">Grid</a> </li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li> <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li> <a href="panels-wells.html">Panels and Wells</a> </li>
								<li> <a href="buttons.html">Buttons</a> </li>
								<li> <a href="notifications.html">Notifications</a> </li>
								<li> <a href="typography.html">Typography</a> </li>
								<li> <a href="icons.html"> Icons</a> </li>
								<li> <a href="grid.html">Grid</a> </li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li> <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li> <a href="panels-wells.html">Panels and Wells</a> </li>
								<li> <a href="buttons.html">Buttons</a> </li>
								<li> <a href="notifications.html">Notifications</a> </li>
								<li> <a href="typography.html">Typography</a> </li>
								<li> <a href="icons.html"> Icons</a> </li>
								<li> <a href="grid.html">Grid</a> </li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li> <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li> <a href="#">Second Level Item</a> </li>
								<li> <a href="#">Second Level Item</a> </li>
								<li> <a href="#">Third Level <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li> <a href="#">Third Level Item</a> </li>
										<li> <a href="#">Third Level Item</a> </li>
										<li> <a href="#">Third Level Item</a> </li>
										<li> <a href="#">Third Level Item</a> </li>
									</ul>
									<!-- /.nav-third-level -->
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li> <a href="categories-mgmt.php"><i class="fas fa-globe"></i> Website managment</a>
						</li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Specs managment</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<br><br>
			<div class="table-responsive col-xs-4">
				<a href="#" data-toggle="modal" data-target="#add-spec"><span class="fa fa-plus" ></span> Add</a>
				<div class="input-group pull-right col-xs-6">
					<input type="text" class="form-control" placeholder="Search" id="specs-search">
					<div class="input-group-btn">
						<span class="btn btn-default">
							<i class="fas fa-search"></i>
      					</span>
					</div>
				</div>
				<br><br>
				<table class="table table-bordered table-hover" id="tbl-specs">
					<thead>
						<tr>
							<th style="display: none;"></th>
							<th class="col-xs-3">Spec</th>
							<th class="col-xs-1">Tools</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include("products-mgmt.php");
						GetAllSpecs();
						?>
					</tbody>
				</table>
				<!-- Modal -->
				<div id="add-spec" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add a new Spec</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="new-spec-name">Name:</label>
									<input type="text" class="form-control" id="new-spec-name">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" id="add-nspec">Save</button>
							</div>
						</div>

					</div>
				</div>
				<!-- Modal -->
				<div id="edit-spec" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Spec</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="edt-spec-name">Name:</label>
									<input type="text" class="form-control" id="edt-spec-name">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" id="save-edt">Save changes</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="js/jquery-3.3.1.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="js/metisMenu.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="js/sb-admin-2.js"></script>

	<!-- Specs mgmt JS file -->
	<script src="js/spec-mgmt.js"></script>

	<!-- Table pagination JS -->
	<script src="js/datatables.min.js"></script>
</body>
</html>