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
	<title>Technonew | Inventory</title>

	<?php TopPage(); ?>
	<!-- Select search -->
	<link href="../css/select2.min.css" rel="stylesheet" type="text/css">
	<!-- Datatables css -->
	<link href="../css/datatables.min.css" rel="stylesheet" type="text/css">
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
					<h1 class="page-header">Inventory</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<div class="form-group col-xs-3">
				<div>
					<ul class="list-inline">
						<li><a href="#" data-toggle="modal" data-target="#add-inv-Modal" id="open-form"><span class="fa fa-plus"></span> Add</a>
						</li>
						<li><a href="#" id="test111"><span class="fas fa-sync-alt"></span> Refresh</a>
						</li>
					</ul>
				</div>
				<label for="ct-list">Select Product:</label>
				<select class="form-control" id="pdt-list">
				</select>
			

				<br>
				<div id="qty"></div>
			</div>
			<br>
			<br>
			<table class="table table-hover text-center" id="sub-items-tbl">
				<thead>
					<tr>
						<th>SN</th>
						<th>Warranty End</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody id="sub-items-list">
				</tbody>
			</table>
			<!-- Add to Inventory Modal -->
			<div id="add-inv-Modal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add to inventory</h4>
						</div>
						<div class="modal-body" action="javascript:void(0);">
							<form id="add-inv-form">
								<div class="form-group">
									<label for="SN">Serial Number:</label>
									<input type="text" class="form-control" id="SN">
								</div>
								<div class="form-group">
									<label for="wed">Warranty end date:</label>
									<input type="date" class="form-control" id="wed">
								</div>
								<p id="duplicate"><i class="fas fa-exclamation-circle"> Serial Number for this product is alredy exists&#33;</i> </p>
								<p id="error"><i class="fas fa-exclamation-circle"> An error has occured. Please try again&#33;</i> </p>
								<input type="submit" class="btn btn-default pull-right" value="Add to inventory" id="add-inv-btn">
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
	<script src="../js/inventory-mgmt.js"></script>

	<script src="../js/datatables.min.js"></script>
</body>
</html>