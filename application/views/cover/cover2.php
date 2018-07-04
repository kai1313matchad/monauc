<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">	
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">
	<!-- Stylesheets -->
	<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/ionicons.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/jquery.classycountdown.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/styles.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/responsive.css')?>" rel="stylesheet">
</head>
<body>	
	<div class="main-area">
		<div class="container full-height position-static">
			<section class="left-section full-height">
				<a class="logo" href="#"><img src="<?php echo base_url()?>assets/img/test/testlogo.png" alt="Logo"></a>
				<div class="display-table">
					<div class="display-table-cell">
						<div class="main-content">
							<h1 class="title"><b>Under Construction</b></h1>
							<p>Our website is currently undergoing scheduled maintenance.
								We Should be back shortly. Thank you for your patience.</p>
							<div class="email-input-area">
								<form method="post">
									<input class="email-input" name="email" type="text" placeholder="Enter your email"/>
									<button class="submit-btn" name="submit" type="submit"><b>NOTIFY US</b></button>
								</form>
							</div><!-- email-input-area -->
							<p class="post-desc">Sign up now to get early notification of our lauch date!</p>
						</div><!-- main-content -->
					</div><!-- display-table-cell -->
				</div><!-- display-table -->
				<ul class="footer-icons">
					<li>Stay in touch : </li>
					<li><a href="#"><i class="ion-social-facebook"></i></a></li>
					<li><a href="#"><i class="ion-social-twitter"></i></a></li>
					<li><a href="#"><i class="ion-social-googleplus"></i></a></li>
					<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
					<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
				</ul>
			</section><!-- left-section -->
			<section class="right-section" style="background-image: url(assets/img/test/testbanner.jpg)">
				<div class="display-table center-text">
					<div class="display-table-cell">
						<div id="rounded-countdown">
							<div class="countdown" data-remaining-sec="2000000"></div>
						</div>
					</div><!-- display-table-cell -->
				</div><!-- display-table -->
			</section><!-- right-section -->
		</div><!-- container -->
	</div><!-- main-area -->
	<!-- SCRIPTS -->
	<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/tether.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.classycountdown.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.knob.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.throttle.js')?>"></script>
	<script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
</body>
</html>