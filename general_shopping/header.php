<?php 
error_reporting(0);
include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>WEB BASED SHOPPING SYSTEM</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>
	<div id="top-bar" class="container">
		</div>
<div id="wrapper" class="container">
<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left">WEB BASED SHOPPING SYSTEM</a>
					<nav id="menu" class="pull-right">
						<ul>
							<?php
				if(isset($_SESSION['aid']))
				{
				echo ' <li><a href="admindashboard.php">Add Products</a></li>';
				echo ' <li><a href="view_products.php">View Products</a></li>';
				echo ' <li><a href="view_sales.php">View Sales</a></li>
				<li><a href="view_review.php">View review</a></li>
				<li><a href="logout.php">Logout</a></li>';
				}
				?>
        
        <?php
				if(isset($_SESSION['stid']))
				{
				echo '<li><a href="shop.php">Shop</a></li>
				<li><a href="order.php">View Orders</a></li>
				<li><a href="logout.php">Logout</a></li>';
				
				}
				if(($_SESSION['stid']=='')&&($_SESSION['aid']==''))
				{
				echo '<li><a href="index.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
        <li><a href="admin-login.php">Admin Login</a></li>';
				}
				?>
						</ul>
					</nav>
				</div>
			</section>
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="themes/images/carousel/banner-2.jpeg" alt="" />
						</li>
					</ul>
				</div>			
			</section>		