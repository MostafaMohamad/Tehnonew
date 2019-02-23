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

	<!-- Admin CSS File -->
	<link href="../css/admin.css" rel="stylesheet" type="text/css">

	<!-- Table pagination CSS -->
	<link href="../css/datatables.min.css" rel="stylesheet" type="text/css">

</head>

<body>
	<div id="wrapper">
		<?php page(); ?>
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
				<div class="col-xs-6 pull-right input-group">
					
					<input type="text" class="form-control" placeholder="Search" id="specs-search">
					<span class="input-group-addon"><i class="fas fa-search"></i></span>
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

	<?php EndPage(); ?>

	<!-- Specs mgmt JS file -->
	<script src="../js/spec-mgmt.js"></script>

	<!-- Table pagination JS -->
	<script src="../js/datatables.min.js"></script>
</body>
</html>