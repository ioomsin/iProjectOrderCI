<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	
	<title>iProject</title>
	
	<!-- CSS -->
	<link href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/jquery/jquery-ui-1.12.1.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/bootstrap/narrow-jumbotron.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/sweetalert2/sweetalert2.css'); ?>" rel="stylesheet">
	
	<!-- SCRIPT -->
	<!-- <script src="<?php echo base_url('assets/js/jquery/jquery-1.12.4.min.js'); ?>"></script> -->
	<script src="<?php echo base_url('assets/js/jquery/jquery-3.1.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery/jqueryUI/jquery-ui-1.12.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap/tether.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/sweetalert2/sweetalert2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootbox/bootbox.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/function_main.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery/jquery.validate/jquery.validate.min.js'); ?>"></script>

</head>

<body>
	<!-- Header -->
	<div class="header clearfix container">
		<nav>
			<ul class="nav nav-pills float-right">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('Orders/index'); ?>">Order</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('Items/index'); ?>">Item</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('Units/index'); ?>">Unit</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('Customers/index'); ?>">Customer</a>
				</li>
			</ul>
		</nav>
		<div>
			<a href="<?php echo site_url('Home/index'); ?>" class="text-muted" style="text-decoration:none;">
				<h3>iProject</h3>
			</a>
		</div>
	</div>
	<!-- Show Detail -->
	<div class="container" id="show_Detail" >
		<!--////////////////////////////////////////////////////////////////////////////////////////////-->
