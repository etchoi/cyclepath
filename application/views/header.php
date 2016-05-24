<nav id="navbar_provider" class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img src="/assets/images/cyclepathlogo.png" width="280px" height="40px";>
      </a>
    </div>
    <div id="header_menu">
      <ul class="nav nav-pills nav-right">
  			<li><a href="/home">HOME</a></li>
  	    	<?php if($this->session->userdata('user_id')) : ?>
  	    		<li><a href="/users/show/<?= $this->session->userdata('user_id')?>">SELLER DASHBOARD</a></li>
  		 	<?php endif ?>
  			<li><a href="/about">ABOUT</a></li>
  			<li><a href="/contact">CONTACT US</a></li>
  			<?php if($this->session->userdata('user_id')) : ?>
  				<li><a href="/logout">LOGOUT</a></li>
  			<?php else : ?>
  		 		<li><a href="/login">LOGIN AND REGISTRATION</a></li>
  			<?php endif ?>
  		</ul>
  </div>
</nav>
