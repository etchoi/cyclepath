<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="UTF-8">
	<title>Edit Your Profile</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/css/header.css">
	<link rel="stylesheet" href="/assets/css/custom.css">
	<link rel="stylesheet" href="/assets/css/style.css">

	
</head>
<body>
<?php $this->load->view('header'); ?>
<div class="container-fluid bg-1 text-center" id="main_container">
	
	<div id="profile_edit">	
	    <h3>Edit Here!</h3>
    	<?php if($this->session->flashdata('edit_errors')) : ?>
    		<div class="error">
				<?php foreach($this->session->flashdata('edit_errors') as $error) : ?>
					<?= $error ?>
				<?php endforeach ?>
			</div>
		<?php endif?>
		<?php echo form_open_multipart('users/update');?>
			<h4>Profile Picture</h4><input type="file" name="userfile"/>
			
			<div class="input-group">
				<input type="text" name="first_name" class="form-control" value="<?=$user['first_name']?>" aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
			  	<input type="text" name="last_name" class="form-control" value="<?=$user['last_name']?>" aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
			  	<input type="text" name="email" class="form-control" value="<?=$user['email']?>" aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
			  	<input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
			</div>
			<input type="hidden" name="id" value="<?= $user['user_id']?>">
			<input type="submit" value="Edit Account" class="btn btn-primary">
			<p>(Enter your password to save changes)</p>
		</form>


			<!-- <h4>First Name</h4><input value="<?=$user['first_name']?>" type="text" name="first_name"> -->
			<!-- <h4>Last Name</h4><input value="<?=$user['last_name']?>" type="text" name="last_name"> -->
			<!-- <h4>Email</h4><input value="<?=$user['email']?>" type="text" name="email"> -->
			<!-- <h4>Password</h4><input type="password" name="password"> -->
			<!-- <input type="hidden" name="id" value="<?= $user['user_id']?>">
			<br>
			<input type="submit" value="Edit Account" class="btn btn-primary"> -->
	</div>
</div>

</body>
</html>
