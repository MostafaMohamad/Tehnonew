<?php
include( 'admin-page-design.php' );
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Technonew | Professions and Majors</title>

	<?php TopPage(); ?>
	<!-- Select search -->
	<link href="../css/select2.min.css" rel="stylesheet" type="text/css">
	<link href="../css/admin.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="wrapper">

		<?php
		page();
		?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Professions and Majors</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<div class="form-group col-xs-3">
				<div>
					<ul class="list-inline">
						<li><a href="#" data-toggle="modal" data-target="#add-pm-Modal" id="open-form"><span class="fa fa-plus"></span> Add</a>
						</li>
						<li><a href="#" id="test111"><span class="fas fa-sync-alt"></span> Refresh</a>
						</li>
					</ul>
				</div>
				<label for="ct-list">Select Profession/Major:</label>
				<select class="form-control" id="pm-list">
				</select>
			




				<br>
				<div id="qty"></div>
			</div>
			<div class="col-xs-12">
				<ul class="list-group col-xs-3" id="progs-list">
				</ul>
			</div>
			<!-- Add to Inventory Modal -->
			<div id="add-pm-Modal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add to inventory</h4>
						</div>
						<div class="modal-body">
							<form action="javascript:void(0);" id="add-pm-form">
								<div class="form-group">
									<label for="pm">Name:</label>
									<input type="text" class="form-control" id="pm">
								</div>
								<div class="form-group">
									<label for="pm-type">Type:</label>
									<select class="form-control" id="pm-type">
										<option value="Major">Major</option>
										<option value="Profession">Profession</option>
									</select>
								</div>
								<input type="submit" value="Save" class="btn btn-primary pull-right">
								<br>
							</form>

						</div>
					</div>

				</div>
			</div>

		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->
	<?php EndPage(); ?>
	<!-- select2 JavaScript File -->
	<script src="../js/select2.min.js"></script>

	<!-- Inventory mgmt JavaScript file -->
	<script src="../js/profession-major.js"></script>
</body>
</html>