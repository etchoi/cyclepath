<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login and Registration</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/css/header.css">
	<link rel="stylesheet" href="/assets/css/style.css">


</head>
<body>
	<?php $this->load->view('header') ?>

<div class="container-fluid bg-1 text-center" id="main_container">
	<div class="login_subcontainer">
	<h3>Not part of the family yet? You're one easy step away from being a 'cycle path'!</h3><br>
	<div id="register">	
    <h3>Register Here!</h3>
    	<?php if($this->session->flashdata('registration_errors')[0]) : ?>
    		<div class="error"><?= $this->session->flashdata('registration_errors')[0]?></div>
		<?php endif?>
		
			<form action="/users/create" method="post">
				<div class="input-group">
				  	<input type="text" name="first_name" class="form-control" placeholder="First Name" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  	<input type="text" name="last_name" class="form-control" placeholder="Last Name" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon3">@</span>
				  	<input type="email" name="email" class="form-control" placeholder="Email Address" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  	<input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  	<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" aria-describedby="basic-addon1">
				</div>
				<input type="submit" value="Create Account" class="btn btn-primary">
				<!-- <h4>First Name</h4><input type="text" name="first_name">
				<h4>Last Name</h4><input type="text" name="last_name">
				<h4>Email</h4><input type="text" name="email">
				<h4>Password</h4><input type="password" name="password">
				<h4>Confirm Password</h4><input type="password" name="confirm_password">
				<br>
				<input type="submit" value="Create Account" class="btn btn-primary"> -->
			</form>
		</div>
	

	<div id="login">	
    <h3>Login Here!</h3>
    	<?php if($this->session->flashdata('login_errors')) : ?>
    		<div class="error"><?= $this->session->flashdata('login_errors')?></div>
		<?php endif?>
		<form action="/users/signin" method="post">
			<div class="input-group">
				<span class="input-group-addon" id="sizing-addon3">@</span>
				<input type="email" name="email" class="form-control" placeholder="Email Address" aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
				<input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
			</div>
			<input type="submit" value="Login" class="btn btn-primary">
		</form>
	</div>
	</div>
</div>
	
</body>
</html>