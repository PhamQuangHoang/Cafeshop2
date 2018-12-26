<?php session_start();
		ob_start();

 ?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Latest compiled JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/index.js?v=<?php echo mt_rand(); ?>"></script>
	<link rel="stylesheet" type="text/css" href="test.css?v=<?php echo mt_rand(); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
	<link rel="stylesheet" type="text/css" href="main.css?v=<?php echo mt_rand(); ?>">
	<script src="js/main.js?v=<?php echo mt_rand(); ?>"></script>
</head>

<body>
	<?php include_once 'navigation.php' ?>
	<!-- dynamictabs -->
	<div class="container-fluid">
		<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
			<div class="row bhoechie-tab-container">

				<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 bhoechie-tab-menu">
					<div class="list-group">
						<a href="#" class="list-group-item active text-center">
							<h4 class="glyphicon glyphicon-menu-hamburger"></h4><br/>Menu
						</a>
						<a href="#" class="list-group-item text-center">
							<h4 class="glyphicon glyphicon-indent-left"></h4><br/>kho
						</a>
						<a href="#" class="list-group-item text-center">
							<h4 class="glyphicon glyphicon-usd"></h4><br/>Thống kê thu chi
						</a>
						<a href="#" class="list-group-item text-center">
							<h4 class="glyphicon glyphicon-inbox"></h4><br/>Thống kê Bill
						</a>
						<a href="#" class="list-group-item text-center">
							<h4 class="glyphicon glyphicon-th"></h4><br/>Quản lí bàn
						</a>

					</div>
				</div>
				<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10 bhoechie-tab">
					<!-- flight section -->

					<div class="bhoechie-tab-content active">
						<?php include_once 'listmenu.php'; ?>
					</div>
					<!-- train section -->
					<div class="bhoechie-tab-content">
						<?php include_once 'resources.php' ?> 
					</div>

					<!-- hotel search -->
					<div class="bhoechie-tab-content">
						<?php include_once 'tkthuchi.php' ?>
					</div>
					<div class="bhoechie-tab-content">
						<?php include_once 'tkbill.php' ?>
					</div>
					<div class="bhoechie-tab-content">

						<?php include_once 'qlban.php' ?>

					</div>

				</div>
				<div class="container">
					<?php include_once 'modals.php'; ?>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
<?php
    ob_end_flush(); // Flush the output from the buffer
?>