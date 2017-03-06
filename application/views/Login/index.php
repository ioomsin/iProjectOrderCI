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

	<div class="container">
		<div class="card-group">
			
			<div class="card">
				<div class="card-block">
					<h3 class="card-title text-muted">Login</h3>
					<form>
						<div class="form-group">
							<label for="exampleInputEmail1" class="col">Email address</label>
							<div class="col">
								<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
							</div>
						</div>
						<div class="form-group">
					    	<label for="exampleInputPassword1" class="col">Password</label>
					    	<div class="col">
					    		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					    	</div>
					  	</div>
					  	<div class="form-group">
					      	<div class="col">
					        	<div class="form-check">
					          		<label class="form-check-label">
					            		<input class="form-check-input" type="checkbox"> Keep me login.
					          		</label>
					      	  	</div>
					      	</div>
					    </div>
					    <div class="form-group">
					    	<div class="col">
					    		<button type="button" class="btn btn-primary btn-block">Login</button>
					    	</div>
					    </div>
					    <!-- <div class="col-6 text-center">
					    	<p class="text-muted">or</p>
					    </div>
					    <div class="form-group">
					    	<div class="col-6">
					    		<button type="button" class="btn btn-primary btn-block">Login with facebook</button>
					    	</div>
					    </div> -->
					    
					  	
					</form>
				</div>
			</div>
			<div class="card">
				<div class="card-block">
					<h3 class="card-title text-muted">Login with..</h3>
				</div>
			</div>
		</div>
	</div>

</body>

</html>