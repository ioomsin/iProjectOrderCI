<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Required meta tags -->
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<title>iProject</title>

	<!-- CSS -->
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/narrow-jumbotron.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery-ui-1.12.1.min.css'); ?>" rel="stylesheet">
    
	<!-- END CSS -->

	<!-- SCRIPT -->
	<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js') ;?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui-1.12.1.min.js') ;?>"></script> 
    <script src="<?php echo base_url('assets/js/tether.min.js') ;?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ;?>"></script>
	<!-- END SCRIPT -->    
	<script>
	
		$(function(){
		
		/*	$('a.nav-link').click(function(){
				var url = window.location.href;
				//console.log(url);
			    $('a.nav-link').removeClass("active");
			    $(this).addClass("active");
			    //$("a[href='"+url+"']").parent().addClass("active");
			    
			});	*/
			
		}) //end $(function()
	
	</script>

</head>
<body>
<!-- Body -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->



    <div class="container">
    
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('Home/index'); ?>">Home <span class="sr-only">(current)</span></a>
            </li> -->
            <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
			    <div class="dropdown-menu">
			      	<a class="dropdown-item" href="<?php echo site_url('Customers/index'); ?>">Customer</a>
			      	<a class="dropdown-item" href="<?php echo site_url('Orders/index'); ?>">Order</a>
			      	<a class="dropdown-item" href="<?php echo site_url('Items/index'); ?>">Item</a>
			      	<a class="dropdown-item" href="<?php echo site_url('Units/index'); ?>">Unit</a>
			    </div>
			</li>
          </ul>
        </nav>
        <a href="<?php echo site_url('Home/index'); ?>" style="text-decoration:none">
        	<h3 class="text-muted">iProject</h3>
        </a>
      </div>	<!-- /header -->
