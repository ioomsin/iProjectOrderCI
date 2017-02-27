<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
	<!-- CSS -->
	<link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/jquery-ui-1.12.1.css'); ?>" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="<?php echo base_url('assets/css/narrow-jumbotron.css'); ?>" rel="stylesheet">
	    
	<!-- END CSS -->
	
	<!-- SCRIPT -->
	<script src="<?php echo base_url('assets/js/jquery-1.12.4.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui-1.12.1.js'); ?>"></script> 
	<script src="<?php echo base_url('assets/js/tether.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/function_main.js'); ?>"></script>
	
  	
</head>
<body>
<div class="container">
<!--////////////////////////////////////////////////////////////////////////////////////////////-->
	
	<div class="header clearfix">
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
		
		<a href="<?php echo site_url('Home/index'); ?>" style="text-decoration:none;">
			<span class="text-muted">iProject</span>
		</a>
		
	</div>
	
<!--////////////////////////////////////////////////////////////////////////////////////////////-->
</div> <!-- End container -->

<div class="container"> 

	<label for="CustomerCode">Customer : </label>
	<div class="row">
		<div class="col">
	  		<input id="CustomerCode" class="form-control" value="">
	  	</div>
	  	<div class="col">
	  		<input id="CustomerName" class="form-control" value="">
	  	</div>
	</div>
	  
	<br>
	  
	<label for="Code">Customer Multi : </label>
	<div class="row">
	  	<div class="col">
	  		<input id="Code" class="form-control" value="">
	  	</div>
	  	<div class="col">
	  		<input id="Name" class="form-control" value="">
	  	</div>
	</div>
	<div class="row">
	  	<div class="col">
	  		<textarea id="Address" rows="2" class="form-control"></textarea>
	  	</div>
	</div>

</div>


<script>
  
	  $( function() {
	
		///// Autocomplete /////
		AutocompleteReturn2Values("<?php echo site_url('Tests/get_autocomplete'); ?>", "CustomerCode", "CustomerName", "CustomerCode", "CustomerName", false);
		AutocompleteReturn2Values("<?php echo site_url('Tests/get_autocomplete'); ?>", "CustomerName", "CustomerCode", "CustomerName", "CustomerCode", false);

		///// Autocomplete Multi /////
		var objAutoComplete = {
				
				elementKeyUp : 	{"elementId" : "Code","fieldName" : "CustomerCode"},
	
				elementOther :	[
											{"showDetail":false,"elementId":"Code","fieldName":"CustomerCode"},
											{"showDetail":true,"elementId":"Name","fieldName":"CustomerName"},
											{"showDetail":false,"elementId":"Address","fieldName":"CustomerAddress"},
								] 
		};
		
		AutoCompleteAjax("<?php echo site_url('Tests/get_autocomplete_obj');?>", objAutoComplete);
	    
	  });
  
</script>
  	 
	
		<br>
		
		<div class="container">
			<footer class="footer text-center">
				<p> &copy; Company 2017 </p>
			</footer>
		</div>	<!-- END Container -->	
	
	
	<!--////////////////////////////////////////////////////////////////////////////////////////////-->	
	</body>

</html>