<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css');?>">
	<title>Login</title>
</head>

<body>
	<div id="main-header">
		<div id="container-fluid">
			<h1 style="font:Roboto-bold;">COOP</h1>
		</div>
	</div>
	<div class="container fluid">
		<div class="row row-centered">
			<section class="col-centered col-xs-10 col-sm-10 col-md-8 col-lg-6" style="float: none; margin: 0 auto;">
				<?php if ($this->session->flashdata('msg')): ?>
					<div class="alert alert-info" role="alert">
						<?= $this->session->flashdata('msg'); ?>
					</div>
				<?php endif; ?>
				<form class="" action="<?= base_url('auth/proses_login')?>" method="post">
					<div class="form-group mail">
						<label class="sr-only" for="inputemail">Username</label>
	   					<input type="text" class="form-control" name="username" placeholder="Username" id="inputemail">
	   					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group pass">
	    				<label class="sr-only" for="inputpassword">Password</label>
	    				<input type="password" class="form-control" name="password" placeholder="Password" id="inputpassword" required="">
	    				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	 	 			</div>
	 	 		 		<button type="submit" class="container btn btn-primary btn-block">Submit</button>
				</form>
			</section>
		</div>
	</div>
</body>


<script src="<?= base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?= base_url('assets/js/script.js');?>"></script>
</body>
</html>
