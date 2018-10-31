	<?php
		session_start();
	?>

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
								Rides				
							</h1>	
							<p class="text-white link-nav"><a href="index.html"> Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Rides </a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	


			<!-- Start home-about Area -->
			<section class="home-about-area section-gap">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 about-left">
							<?php
								if($_SESSION['uname'] != 1000){
									echo '<h1>Your Rides</h1><br>';

										require 'connect.php';

										if(isset($_SESSION['uname'])){
										    //
										}
										else{
										    echo "<script>
										        alert('Please login');
										        window.location.href='loginuser.html';
										        </script>";
										}

										$x = $_SESSION['uname'];

										$query = "select * from booking where  login_id = ".$x;
										$s = oci_parse($c, $query);
										if (!$s) {
										    $m = oci_error($c);
										    trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
										}
										$r = oci_execute($s);
										if (!$r) {
										    $m = oci_error($s);
										    trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
										}
										 
										echo "<table id='customer'>\n\n";
										$ncols = oci_num_fields($s);
										echo "<tr>\n";
										for ($i = 1; $i <= $ncols; ++$i) {
										    $colname = oci_field_name($s, $i);
										    echo "  <th><b>".htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</b></th>\n";
										}
										echo "</tr>\n";
										 
										while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
										    echo "<tr>\n";
										    foreach ($row as $item) {
										        echo "<td>";
										        echo $item!==null?htmlspecialchars($item, ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp;";
										        echo "</td>\n";
										    }
										    echo "</tr>\n";
										}
										echo "</table>\n";
									}
								else{
									echo 'Please Login';
								}
										echo '<br><br><h1>Your Slot</h1>';
										$query = "select * from slot where  login_id = ".$x;
										$s = oci_parse($c, $query);
										if (!$s) {
										    $m = oci_error($c);
										    trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
										}
										$r = oci_execute($s);
										if (!$r) {
										    $m = oci_error($s);
										    trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
										}
										 
										echo "<table id='customer'>\n\n";
										$ncols = oci_num_fields($s);
										echo "<tr>\n";
										for ($i = 1; $i <= $ncols; ++$i) {
										    $colname = oci_field_name($s, $i);
										    echo "  <th><b>".htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</b></th>\n";
										}
										echo "</tr>\n";
										 
										while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
										    echo "<tr>\n";
										    foreach ($row as $item) {
										        echo "<td>";
										        echo $item!==null?htmlspecialchars($item, ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp;";
										        echo "</td>\n";
										    }
										    echo "</tr>\n";
										}
										echo "</table>\n";
							?>
						</div>
					</div>
				</div>	
			</section>
			<!-- End home-about Area -->

			
			<!-- End home-calltoaction Area -->										
				    																			
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Quick links</h6>
								<ul>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Brand Assets</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Terms of Service</a></li>
								</ul>								
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Features</h6>
								<ul>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Brand Assets</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Terms of Service</a></li>
								</ul>								
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Resources</h6>
								<ul>
									<li><a href="#">Guides</a></li>
									<li><a href="#">Research</a></li>
									<li><a href="#">Experts</a></li>
									<li><a href="#">Agencies</a></li>
								</ul>								
							</div>
						</div>												
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>							
						<div class="col-lg-4  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Newsletter</h6>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">
									<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
										<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
			                            	<button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
			                            	<div style="position: absolute; left: -5000px;">
												<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
											</div>

										<div class="info"></div>
									</form>
								</div>
							</div>
						</div>	
<p class="mt-80 mx-auto footer-text col-lg-12">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="index.html" target="_blank">HnK Cabs</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>												
					</div>
				</div>
				<img class="footer-bottom" src="img/footer-bottom.png" alt="">
			</footer>	
			<!-- End footer Area -->	

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
 			<script src="js/jquery-ui.js"></script>								
			<script src="js/jquery.nice-select.min.js"></script>							
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>