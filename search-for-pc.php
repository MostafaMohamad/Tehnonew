<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Style css -->
	<link href="css/style.css" type="text/css" rel="stylesheet">

	<!-- Select2 css -->
	<link href="css/select2.min.css" type="text/css" rel="stylesheet">

	<!-- jQuery library -->
	<script src="js/jquery-3.3.1.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<link type="text/css" rel="stylesheet" href="css/all.min.css">
	<title>Technonew | PC Search</title>
</head>

<body>
	<?php   
	include("nav-tools.php");
	?>
	<div class="container">

		<div class="tab-content text-center">
			<div id="home" class="tab-pane fade in active center-block text-center vertical-center">
				<h2>Search for a PC by</h2><br>
				<div class="col-xs-5 pull-left">
					<img class="btn img-responsive choice" src="img/img-profession.jpg" data-toggle="modal" data-target="#prof-mj-modal">
					<h4>Major or Profession</h4>
				</div>
				<div class="col-xs-5 pull-right">
					<img class="btn img-responsive choice" src="img/img-software.jpeg" data-toggle="modal" data-target="#prog-modal">
					<h4>Software or specs</h4>
				</div>
			</div>
			<div id="menu1" class="tab-pane fade">
				<div id="menu2" class="tab-pane fade">
					<h3>Menu 2</h3>
					<p>Some content in menu 2.</p>
				</div>
			</div>
		</div>
		<!-- Major/Profession Modal -->
		<div id="prof-mj-modal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Search for a PC by profession/major</h4>
					</div>
					<div class="modal-body">
						<h4>Major/Profession</h4>
						<select class="form-control" id="prof-mj" style="width: 100%;">
							<?php
							include( 'ws/ws_search.php' );
							GetProfessions();
							GetMajors();
							?>
						</select>
						<h4>Preferred OS</h4>
						<select class="form-control" id="os-type" style="width: 100%;">
							<option>All</option>
							<option>Windows</option>
							<option>macOS</option>
						</select>
						<h4>Maximum price</h4>
						<input type="number" class="form-control" id="max-price">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="mp-search">Search <span class="fas fa-search"></span></button>
					</div>
				</div>
			</div>
		</div>
		<!-- Software Modal -->
		<div id="prog-modal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Search for a PC by software&#40;s&#41;</h4>
					</div>
					<div class="modal-body">
						<h4>Choose OS:</h4>
						<select class="form-control" id="prog-os" style="width: 100%;">
							<option>All</option>
							<option>Windows</option>
							<option>macOS</option>
						</select>
						<h4>Choose your most used programs:</h4>
						<select id="progs-list" style="width: 100%;" disabled>
						</select>
					


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>
	</div>


</body>
<script src="js/tools.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/globals.js"></script>
<script src="js/pc-search.js"></script>
</html>