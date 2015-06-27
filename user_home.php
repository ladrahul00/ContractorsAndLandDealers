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
		<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
		<script src="js/modernizr.js"></script> <!-- Modernizr -->
		<title>Converge: Contractor's group</title>
	</head>
	<body>
        <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
            <li><span>Image 05</span></li>
            <li><span>Image 06</span></li>
        </ul>
	
	<div class="nav-bar">
		<nav class="main-nav">
		<ul align="right">
		<li><label class="greet">Hii <?php echo $login_session; ?></label></li>
		<li><a class="cd-signup" href="index.html">Log Out</a></li>
		</ul>
		</nav>
	</div>
	<header role="converge">
	<div align="center"><a href="#0"><h1 class="toptitle">CONVERGE</h1></a></div>
	</header>
	<form action="searchresult.php" method="POST" name="search_by_locality">
	<div class="searchbar">
		<div class="locality">
			<select class="local" name="local_name">
				<option value="" selected="selected">Select Locality</option>
				<option value="Katraj">Katraj</option>
				<option value="Swargate">Swargate</option>
				<option value="Shivajinagar">ShivajiNagar</option>
				<option value="Market Yard">Market Yard</option>
				<option value="Kondhwa">Kondhwa</option>
				<option value="Camp">Camp</option>
				<option value="Koregaon Park">Koregaon Park</option>
				<option value="Pimpri">Pimpri</option>
				<option value="Chinchwad">Chinchwad</option>
				<option value="Baner">Baner</option>
				<option value="Vadgaon">Vadgaon</option>
				<option value="Hinjewadi">Hinjewadi</option>
			</select>
		</div>
		<div class="bhk">
			<select class="bhk_no" name="nbhk">
				<option value="" selected="selected">BHK</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="3.5">3.5</option>
				<option value="4">4</option>
			</select>
		</div>
		<div class="goSearch">
			<input type="submit" value="Go" class="go"name="go">
		</div>
	</div>
</form>
	 
		<footer class="footer-distributed">
		<div class="footer-left">

			<p class="footer-links" align="right">
					<a href="index.html">Home</a>
					·	
					<a href="#">Advertising</a>
					·
					<a href="try.php">Contact</a>
					·
					<a href="aboutus.html">About us</a>

			</p>

			<p>Converge copyright &copy; 2015</p>
		</div>

		</footer>

	<script src="js/main.js"></script> <!-- Gem jQuery -->


</body>
</html>