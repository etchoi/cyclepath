<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/assets/css/header.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/style.css">
  <title>Create a Listing</title>
</head> 


<body>  
<?php $this->load->view('header.php') ?>

<div class="container" id="main_container">
  <!-- <div class="row">
    <div class="col-md-5"> -->
  <div id="search_inputs">

	<h3>Create A Listing Here!</h3>

    <?php if($this->session->flashdata('errors')) : ?>
      <div class="error">
        <?php foreach($this->session->flashdata('errors') as $error) : ?>
          <?= $error ?>
        <?php endforeach ?>
      </div>
    <?php endif?>

    <?php echo form_open_multipart('listings/create_item');?>
    
    <div>
      Name: <input type='text' name='name' class="form-control">
    </div>

    <div id="create_category">
      Category: <select name='category' class="form-control">
        <option value="Wheels">Wheels</option>
        <option value="Brakes">Brakes</option>
        <option value="Shifters/Derailleurs">Shifters/Derailleurs</option>
        <option value="Handbars/Grips">Handbars/Grips</option>
        <option value="Pedals/Cleats">Pedals/Cleats</option>
        <option value="Cranksets/Chainrings/Chainsets">Cranksets/Chainrings/Chainsets</option>
        <option value="Chains/Cassettes">Chains/Cassettes</option>
        <option value="Saddles/Seats/Seatposts">Saddles/Seats/Seatposts</option>
      </select>      
    </div>
   
    <div>
      Brand: <select name='brand' class="form-control">
        <option value="Cannondale">Cannondale</option>
        <option value="GIANT">Giant</option>
        <option value="GT">GT</option>
        <option value="Kona">Kona</option>
        <option value="Marin">Marin</option>
        <option value="Merida">Merida</option>
        <option value="Santa Cruz Bicycles">Santa Cruz Bicycles</option>
        <option value="Scott">Scott</option>
        <option value="Specialized">Specialized</option>
        <option value="Trek">Trek</option>
        <option value="Other">Other</option>
      </select>
    </div>

    <div>
      Description: <input type='text' name='description' class="form-control">
    </div>

    <div>
      Price: <input type='number' name='price' step="0.01" class="form-control">
    </div>
    
    <div>
      <input type="file" name="userfile"/>
    </div>

    <input type='submit' value='Post' class="btn btn-primary" id="create_submit">

	</form>
  </div>
</div>

</body>
</html>