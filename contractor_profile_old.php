<?php
include('lock.php');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
		<script src="js/modernizr.js"></script> <!-- Modernizr -->
		<link rel="stylesheet" href="css/site_info_css.css">
		<title>Converge: Contractor's group</title>
		<style>
		</style>
	</head>
<body>
	<header role="converge">
	<div align="center">
		<a href="#0"><img src="logo.png" id="main-logo"></a>
	</div>
	<div class="nav-bar">
		<div class="profile_info">
			Hi Contractor <?php echo $login_session; ?>
		</div>
		<div class="nav-button">
			<nav class="main-nav">
			<ul align="right">
			<li><a class="cd-signin" href="#0">Profile</a></li>
			<li><a class="cd-signup" href="logout.php">Logout</a></li>
			</ul>
			</nav>
		</div>
	</div>	
	
	</header>

	<div id="box_1">
		<div id="block">
			<h4 align="center">Profile picture</h4>
		</div>
		<div  class="vr">&nbsp;</div>
	</div>
	<div id="box_2">
		<div class="prevWork">
			<h3>Previous Work</h3>
		</div>
	</div>
	<footer class="footer-distributed">
		<div class="footer-left">

			<p class="footer-links" align="right">
					<a href="#">Home</a>
					·	
					<a href="#">Advertising</a>
					·
					<a href="try.php">Contact</a>
					·
					<a href="aboutus.html">About us</a>

			</p>

			<p>Company Name &copy; 2015</p>
		</div>

		</footer>



</body>
</html>