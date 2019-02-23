<?php include('admin-page-design.php'); ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Technonew | Admin</title>

	<?php TopPage(); ?>

	<!-- Table pagination CSS -->
	<link href="../css/datatables.min.css" rel="stylesheet" type="text/css">

	<!-- Select style  CSS -->
	<link href="../css/select2.min.css" rel="stylesheet" type="text/css">

	<!-- Admin CSS File -->
	<link href="../css/admin.css" rel="stylesheet" type="text/css">
	
</head>

<body>
	<div id="wrapper">
		<?php page(); ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Software System Requirements</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<div class="table-responsive">
				<ul class="list-inline">
					<li><a href="#" data-toggle="modal" data-target="#add-prog" id="btn-add-prog"><span class="fas fa-plus"> Add new</span></a>
					</li>
					<li><a href="#" data-toggle="modal" data-target="#ext-modal" id="btn-add-ext"><span class="fas fa-plus-square"  data-toggle="tab" href="#home"> Add from existing</span></a>
					</li>
					<div class="input-group pull-right col-xs-2">
						<input type="text" class="form-control" placeholder="Search" id="progs-search">
						<span class="input-group-addon"><i class="fas fa-search"></i></span>
					</div>
				</ul>
				<table class="table  table-hover text-center" id="all-prog-tbl">
					<thead>
						<tr>
							<th class="col-xs-2">Name</th>
							<th class="col-xs-1">CPU</th>
							<th class="col-xs-1">Multicore</th>
							<th class="col-xs-1">RAM</th>
							<th class="col-xs-1">GPU</th>
							<th class="col-xs-1">OS</th>
							<th class="col-xs-2">Description</th>
							<th class="col-xs-1">Image</th>
							<th class="col-xs-1">Tools</th>
							<th class="col-xs-1">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include('products-mgmt.php');
						GetAllProgarms();
							?>
					</tbody>
				</table>
			</div>
			<!-- Modal -->
			<div id="add-prog" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">New Software</h4>
						</div>
						<div class="modal-body">
							<h5 class="col-sm-12">Please enter the recommended specs to use the current software&#58;</h5><br>
							<form action="javascript:void(0);" id="new-program-form">
								<div class="form-group col-sm-6">
									<br>
									<label for="prg-name">Name:</label>
									<input type="text" class="form-control" id="prg-name" required>
								</div>
								<div class="form-group col-sm-6">
									<br>
									<label for="cpu">CPU &#40;GHz&#41;:</label>
									<input type="text" class="form-control" id="cpu" required>

								</div>
								<div class="form-group col-sm-6">
									<label for="ram">RAM &#40;GB&#41;:</label>
									<input type="text" class="form-control" id="ram" required>
								</div>
								<div class="form-group col-sm-6">
									<label for="gpu">GPU &#40;GB&#41;:</label>
									<input type="text" class="form-control" id="gpu" required>

								</div>
								<div class="form-group col-sm-6">
									<label for="os">OS:</label>
									<select class="form-control" id="os" required>
										<option>Windows</option>
										<option>macOS</option>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label for="os-v">OS Version:</label>
								










									<select class="form-control" id="os-v" required>
										<option>32 bit</option>
										<option>64 bit</option>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label for="m-core">Needs Multicore CPU:</label>
									<select class="form-control" id="m-core" required>
										<option>No</option>
										<option>Yes</option>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label for="icon">Softawre Icon (.svg file):</label>
									<input type="file" class="form-control" id="icon" name="icon" accept=".svg" required>

								</div>
								<div class="form-group col-sm-3 pull-right">
									<input type="submit" class="btn btn-primary form-control" value="Save">
								</div>
							</form>
						</div>
						<div class="modal-footer">

						</div>
					</div>
				</div>
			</div>
			<!-- Existing program Modal  -->
			<div id="ext-modal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add from existing software</h4>
						</div>
						<div class="modal-body">
							<div class="tab-content">
								<div id="home" class="tab-pane fade in active">
									<h3>Select a software</h3>
									<select class="form-control" style="width: 100%;" id="ext-prog"></select>
									<br><br><br>
									<button class="btn btn-success pull-right" data-toggle="tab" href="#menu1" id="prog-nxt">Next</button>
									<br><br>
								</div>
								<div id="menu1" class="tab-pane fade">
									<h3>System requirements</h3><br>
									<form action="javascript:void(0);" id="ext-program-form">
										<div class="form-group col-sm-6">
											<label for="xcpu">CPU &#40;GHz&#41;:</label>
											<input type="text" class="form-control" id="xcpu" required>

										</div>
										<div class="form-group col-sm-6">
											<label for="xram">RAM &#40;GB&#41;:</label>
											<input type="text" class="form-control" id="xram" required>
										</div>
										<div class="form-group col-sm-6">
											<label for="xgpu">GPU &#40;GB&#41;:</label>
											<input type="text" class="form-control" id="xgpu" required>

										</div>
										<div class="form-group col-sm-6">
											<label for="xos">OS:</label>
											<select class="form-control" id="xos" required>
												<option>Windows</option>
												<option>macOS</option>
											</select>
										</div>
										<div class="form-group col-sm-6">
											<label for="xos-v">OS Version:</label>
										

											<select class="form-control" id="xos-v" required>
												<option>32 bit</option>
												<option>64 bit</option>
											</select>
										</div>
										<div class="form-group col-sm-6">
											<label for="xm-core">Needs Multicore CPU:</label>
											<select class="form-control" id="xm-core" required>
												<option>No</option>
												<option>Yes</option>
											</select>
										</div>
										<hr>
										<div class="form-group pull-right col-sm-2">
											<input type="submit" class="form-control btn btn-primary" value="Save">
										</div>
									</form><br><br><br><br><br><br><br><br><br><br><br><br>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	
	<?php EndPage(); ?>

	<!-- Table pagination JavaScript -->
	<script src="../js/datatables.min.js"></script>

	<!-- Select style JavaScript -->
	<script src="../js/select2.min.js"></script>

	<!-- Software mgmt JavaScript -->
	<script src="../js/software-mgmt.js"></script>
</body>
</html>