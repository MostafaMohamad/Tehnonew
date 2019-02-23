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
</head>

<body>
	<div id="wrapper">
		<?php page(); ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Website managment</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<div class="form-group col-xs-3">
				<div id="top-table">
					<ul class="list-inline">
						<li><a href="#" id="add_new" data-toggle="modal" data-target="#subc-modal"><span class="fa fa-plus"></span> Add</a>
						</li>
						<li><a href="#"><span class="fas fa-sync-alt"></span> Refresh</a>
						</li>
					</ul>
				</div>
				<label for="ct-list">Select Category:</label>
				<select class="form-control" id="ct-list">
					<option>Computers</option>
					<option>Computer Accessories</option>
					<option>Mobile phones</option>
					<option>Electronics</option>
					<option>Mobile Accessories</option>
					<option>Computer Parts</option>
				</select>
				<br>
				<ul class="list-group" id="subc-list">
				</ul>
			</div>
		</div>
		<!-- /#page-wrapper -->
		<!-- Modal -->
		<div id="subc-modal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">New subcategory</h4>
					</div>
					<div class="modal-body col-xs-12"><br>
						<form id="newsubc" action="javascript:void(0);">
							<div class="col-xs-6 form-group">
								<label for="ct-list1">Select Category:</label>
								<select class="form-control" id="ct-list1" required>
									<option>Computers</option>
									<option>Computer Accessories</option>
									<option>Mobile phones</option>
									<option>Electronics</option>
									<option>Mobile Accessories</option>
									<option>Computer Parts</option>
								</select>
							</div>
							<div class="col-xs-6 form-group">
								<label for="subc-text">Enter Subcategory:</label>
								<input type="text" id="subc-text" class="form-control" required>
							</div>
							<div class="form-group col-xs-2 pull-right">
								<button type="submit" class="btn btn-primary pull-right form-control">Save</button>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<div class="form-group">
							<p class="error"><span class="fas fa-exclamation-circle"></span> An error has occurred! Please try again.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /#wrapper -->
	
	<?php EndPage(); ?>
	
	<!-- wm js file -->
	<script src="../js/wm.js"></script>
</body>
</html>