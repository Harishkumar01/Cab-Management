	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<link rel="stylesheet" href="table.css">
		<title>Taxi</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/jquery-ui.css">			
			<link rel="stylesheet" href="css/main.css">
		</head>
<body>	
			  <header id="header">
			    <div class="container main-menu">
			    	<div class="row align-items-center justify-content-between d-flex">
			    		<a href="index.html" style="font-size: 25px;color:white;">HnK Cabs</a>		
						<nav id="nav-menu-container">
							<ul class="nav-menu">
							  <li class="menu-active"><a href="index.html">Home</a></li>
							  <li><a href="about.html">About</a></li>
							  <li><a href="service.html">Services</a></li>
							  <li><a href="gallery.html">Gallery</a></li>
							  <li class="menu-has-children"><a href="login.html">Log in</a></li>
							  <li class="menu-has-children"><a href="signup.html">Sign up</a></li>
							  <li><a href="rides.php">Your Rides</a></li>	
							  <li><a href="contact.html">Contact</a></li>
							</ul>
						</nav><!-- #nav-menu-container -->		
			    	</div>
			    </div>
			  </header><!-- #header -->
			  
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Carlist				
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Carlist</a></p>
						</div>	
					</div>
				</div>
			</section>
			<section class="home-about-area section-gap">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 about-left">
						<?php
							require 'connect.php';
							$query = "select distinct name from vehicle";
							$s = oci_parse($c, $query);
							$r = oci_execute($s);
						
							while($row = oci_fetch_array($s)){
						    	echo '<li>'.$row['NAME'].'</li><br>';
							}
						?>
					</div>
				</div>
			</div>
		</section>
	</body>
	</html>S