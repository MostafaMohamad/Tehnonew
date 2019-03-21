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
					<h1 class="page-header">User Statistics</h1>
				</div>
				<!-- /.col-lg-12 -->
				<div class="col-xs-10">
				<canvas id="myChart"></canvas>
			</div>
			</div>
			<br><br>
			
			

		</div>
		<!-- /#page-wrapper -->
		
	</div>
	<!-- /#wrapper -->

	<?php EndPage(); ?>


</body>
<script src="../js/Chart.js"></script>
<script src="../js/user-stats.js"></script>
</html>