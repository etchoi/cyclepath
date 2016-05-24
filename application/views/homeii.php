<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/header.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/home.css">


  <!-- Latest compiled and minified JavaScript -->
<title>Cycle Path Homepage</title>
</head>

<body>
	<?php $this->load->view('header') ?>

  <!-- create hyperlink around img and button in addition to the hyperlink -->



  <div class="container-fluid bg-1 text-center" id="main_container">
		<div class="row">
		  <div class="col-sm-3 col-md-3">
		    <div class="thumbnail">
					<a href="search/wheels">
            <img src="/assets/images/categories/wheels.jpg" width="180px" height="180px";>
            <button class="btn btn-primary-outline" type="button">Wheels</button>
          </a>
		    </div>
		  </div>
			<div class="col-sm-3 col-md-3">
		    <div class="thumbnail">
					<a href="search/brakes">
						<img src="/assets/images/categories/brakes.jpg" width="180px" height="180px";>
						<button class="btn btn-primary-outline" type="button">Brakes</button>
					</a>
		    </div>
		  </div>
			<div class="col-sm-3 col-md-3">
		    <div class="thumbnail">
					<a href="search/derailleurs">
						<img src="/assets/images/categories/derailleur.jpg" width="180px" height="180px";>
						<button class="btn btn-primary-outline" type="button">Shifters/Derailleurs</button>
					</a>
		    </div>
		  </div>
			<div class="col-sm-3 col-md-3">
		    <div class="thumbnail">
					<a href="search/grips">
						<img src="/assets/images/categories/handlebar.jpg" width="180px" height="180px";>
						<button class="btn btn-primary-outline" type="button">Handlebars/Grips</button>
					</a>
		    </div>
		  </div>
		</div>

		<div class="row">
		  <div class="col-sm-3 col-md-3">
		    <div class="thumbnail">
					<a href="search/pedals">
						<img src="/assets/images/categories/pedals.jpg" width="180px" height="180px";>
						<button class="btn btn-default" type="button">Pedals/Cleats</button>
					</a>
		    </div>
		  </div>
			<div class="col-sm-3 col-md-3">
		    <div class="thumbnail">
					<a href="search/crankset">
						<img src="/assets/images/categories/crankset.jpg" width="180px" height="180px";>
					 <button class="btn btn-default" type="button">Cranksets/Chainsets</button>
					</a>
		    </div>
		  </div>
			<div class="col-sm-3 col-md-3">
		    <div class="thumbnail">
					<a href="search/chains">
						<img src="/assets/images/categories/chains.jpg" width="180px" height="180px";>
						<button class="btn btn-default" type="button">Chains/Cassettes</button>
					</a>
		    </div>
		  </div>
			<div class="col-sm-3 col-md-3">
		    <div class="thumbnail">
					<a href="search/saddles">
						<img src="/assets/images/categories/saddle.jpg" width="180px" height="180px";>
						<button class="btn btn-default" type="button">Saddles/Seats/Seatposts</button>
					</a>
		    </div>
		  </div>
		</div>

  </div>


    <div class="content" id="home_content">
      <div class="seller col-md-6">
        <h4>Seller of the Week</h4>
        <p>
					Proin quam. Etiam ultrices. Suspendisse in justo eu magna luctus suscipit. Sed lectus. Integer euismod lacus luctus magna. Quisque cursus, metus vitae pharetra auctor, sem massa mattis sem, at interdum magna augue eget diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lacinia molestie dui. Praesent blandit dolor. Sed non quam. In vel mi sit amet augue congue elementum. Morbi in ipsum sit amet pede facilisis laoreet. Donec lacus nunc, viverra nec, blandit vel, egestas et, augue. Vestibulum tincidunt malesuada tellus.
				</p>
      </div>
      <div class="item col-md-6">
        <h4>Item of the Week</h4>
        <p>
        	Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet. Vestibulum sapien.
        </p>
      </div>
    </div>

</body>
</html>
