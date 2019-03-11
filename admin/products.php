<?php include('admin-page-design.php'); ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Technonew | Products</title>

	<?php TopPage();?>

	<!-- Select search -->
	<link href="../css/select2.min.css" rel="stylesheet" type="text/css">

	<!-- Custom css -->
	<link href="../css/admin.css" rel="stylesheet" type="text/css">

	<!-- Datatables css -->
	<link href="../css/datatables.min.css" rel="stylesheet" type="text/css">

</head>

<body>
	<div id="wrapper">
		<?php page(); ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Products</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home" id="general">General</a>
				</li>
				<li><a data-toggle="tab" href="#pdt-info">Product</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="home" class="tab-pane fade in active"> <br>
					<div id="top-table">
						<ul class="list-inline">
							<li><a href="../product-add.html"><span class="fa fa-plus"></span> Add</a>
							</li>
							<li><a href="#"><span class="fas fa-save"></span> Save</a>
							</li>
							<li><a href="#"><span class="fas fa-sync-alt"></span> Refresh</a>
							</li>
							<li><a href="#"><span class="fas fa-filter"></span> Filter</a>
							</li>
							<li><a href="#"><span class="fas fa-sort"></span> Sort</a>
							</li>
							<li>
								<select class="form-control" id="pdt-status" onchange="location = this.value;">
									<option value="products.php?op=products" <?php if($_GET[ 'op']=="products" ){echo( 'selected="selected"');}?> >All Products</option>
									<option value="products.php?op=enabled" <?php if($_GET[ 'op']=="enabled" ){echo( 'selected="selected"');}?> >Enabled Products</option>
									<option value="products.php?op=disabled" <?php if($_GET[ 'op']=="disabled" ){echo( 'selected="selected"');}?> >Disabled Products</option>
									<option value="products.php?op=featured" <?php if($_GET[ 'op']=="featured" ){echo( 'selected="selected"');}?> >Featured Products</option>
								</select>
							</li>
							<div class="input-group pull-right col-sm-4 col-xs-12">
								<input type="text" class="form-control" placeholder="Search" id="tbl-search">
								<span class="input-group-addon"><i class="fas fa-search"></i></span>
							</div>
						</ul>
					</div>
					<br>
					<div class="table-responsive">
						<table class="table table-hover text-center" id="allpdttbl">
							<thead>
								<tr>
									<th class="col-xs-1">Name</th>
									<th class="col-xs-1">Model number</th>
									<th class="col-xs-1">Subcategory</th>
									<th class="col-xs-1">Brand</th>
									<th class="col-xs-1">Price</th>
									<th class="col-xs-1">Description</th>
									<th class="col-xs-1">Quantity</th>
									<th class="col-xs-1">Image</th>
									<th class="col-xs-1">Tools</th>
									<th class="col-xs-1">Status</th>
								</tr>
							</thead>
							<tbody>

								<?php
								include( 'products-mgmt.php' );
								?>
							</tbody>
						</table>
					</div>
				</div>

				<div id="pdt-info" class="tab-pane fade">
					<div class="tab-content"> <br>
						<div id="product-info" class="tab-pane fade in active">
							<h3>Product Info</h3>
							<form id="pdt-info-form">
								<div class="form-group col-xs-6">
									<label for="pdt-name">Name:</label>
									<input type="text" class="form-control" id="pdt-name">
								</div>
								<div class="form-group col-xs-6">
									<label for="pdt-model">Model number:</label>
									<input type="text" class="form-control" id="pdt-model">
								</div>
								<div class="form-group col-xs-6">
									<label for="pdt-subc">Subcategory:</label>
									<select class="form-control" id="pdt-subc" style="width: 100%;">
              </select>
								




								</div>
								<div class="form-group col-xs-6">
									<label for="pdt-brand">Brand:</label>
									<input type="text" class="form-control" id="pdt-brand">
								</div>
								<div class="form-group col-xs-6">
									<label for="pdt-image">Image:</label>
									<input type="file" class="form-control" id="pdt-image" name="file">
								</div>
								<div class="form-group col-xs-6">
									<label for="pdt-price">Price:</label>
									<input type="text" class="form-control" id="pdt-price">
								</div>
								<div class="form-group col-xs-12">
									<label for="pdt-dsc">Description:</label>
									<textarea class="form-control" rows="5" id="pdt-dsc"></textarea>
								</div>
							</form>
							<div class="form-group col-xs-2">
								<button class="btn btn-primary form-control" data-toggle="tab" href="#specs">Next</button>
							</div>
						</div>
						<div id="specs" class="tab-pane fade">
							<a data-toggle="tab" href="#product-info"><i class="fas fa-arrow-left"></i> Back</a>
							<h3>Specs</h3>
							<div class="form-group col-xs-5">
								<select class="form-control spec-name" style="width: 100%;">
              </select>
							










							</div>
							<div class="form-group col-xs-5">
								<input type="text" class="form-control spec-val">
							</div>
							<div id="specs-body"> </div>
							<div class="form-group col-xs-2">
								<button class="btn btn-primary form-control fas fa-plus-circle" id="new-spec"></button>
							</div>
							<div class="form-group col-xs-2">
								<button class="btn btn-primary form-control" data-toggle="tab" href="#upload-images">Next</button>
							</div>
						</div>
						<div id="upload-images" class="tab-pane fade">
							<a data-toggle="tab" href="#specs"><i class="fas fa-arrow-left"></i> Back</a>
							<h3>More details</h3>
							<div class="form-group col-xs-5">
								<label for="images">Product photos:</label>
								<input type="file" name="images[]" id="images" class="form-control" multiple>
								<button class="btn btn-primary form-control" id="imup">Save</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Add to Featured Modal -->
			<div id="addtoftd" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" id="pdtname"></h4>
							<h6 class="modal-title" id="pdtmodel"></h6>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to add this product to <b>featured products</b>?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" id="save-ftd">Save</button>
						</div>
					</div>

				</div>
			</div>
			<!--Remove from featured Modal -->
			<div id="rm-ftd" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" id="fpdtname"></h4>
							<h6 class="modal-title" id="fpdtmodel"></h6>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to remove this product from <b>featured products</b>?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" id="save-nftd">Save</button>
						</div>
					</div>

				</div>
			</div>
			<!--Disable a product Modal -->
			<div id="disable" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" id="dpdtname"></h4>
							<h6 class="modal-title" id="dpdtmodel"></h6>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to <b>disable</b> this product?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" id="disable-pdt">Save</button>
						</div>
					</div>

				</div>
			</div>
			<!--Enable a product Modal -->
			<div id="enable" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" id="epdtname"></h4>
							<h6 class="modal-title" id="epdtmodel"></h6>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to <b>enable</b> this product?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" id="enable-pdt">Save</button>
						</div>
					</div>

				</div>
			</div>

			<!--Edit product price -->
			<div id="price-edt" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" id="pdtpname"></h4>
							<h6 class="modal-title" id="pdtpmodel"></h6>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="price-edt-input">Price &#40;&#36;&#41;:</label>
								<input type="text" class="form-control" id="price-edt-input">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" id="save-price">Save</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<?php EndPage(); ?>

	<!-- Products JavaScript File -->
	<script src="../js/products.js"></script>

	<!-- select2 JavaScript File -->
	<script src="../js/select2.min.js"></script>

	<script src="../js/datatables.min.js"></script>
</body>
</html>