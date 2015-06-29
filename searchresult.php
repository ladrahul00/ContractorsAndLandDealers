<?php

include('lock.php');
echo "<script>window.onunload = function() { void (0) }</script>";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$key = $_POST['local_name'];
	$bhk = $_POST['nbhk'];

	if (isset($_POST['go'])) 
	{ 
		$q = "SELECT * FROM project where LOCALITY='".$key."' AND BHK='".$bhk."'";
		$result = mysqli_query($dbc,$q); 
	}
	else
		echo "Not set";
	if(empty($_SESSION['USERNAME'])){
		$_SESSION['USERNAME']="GUEST";
	}
}
?>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="searchResults/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="searchResults/css/style.css"> <!-- Gem style -->
		<script src="searchResults/js/modernizr.js"></script> <!-- Modernizr -->
		<script type="text/javascript" src="searchResults/js/jquery.cycle.all.js"></script> 

		<title>Converge: Contractor's group</title>
	</head>
<body>
	<header role="converge">
	<div align="left"><a href="searchresult.php"><h1 class="toptitle">CONVERGE</h1></a></div>
	</header>
	<div class="nav-bar">
		<nav class="main-nav">
				<div class="greeting">
			Hello <?php echo $_SESSION['USERNAME']; ?>
		</div>
		<?php
				if($_SESSION['USERNAME']!="GUEST"){
		?>
		<div class="buttons">
			<ul align="right">
			<li><a class="cd-signin" href="logout.php">Log Out</a></li>
			</ul>
		</div>
				<?php
					}
				?>
		</nav>
	</div>	
	<div class="one"></div>
	<div class="two">
	<label>Search Results :: <?php echo $result->num_rows; ?></label>
	<?php   
		while($row=$result->fetch_assoc())
		{ 
		$pid=$row['PROJECT_ID'];
		echo '<a href="site.php?pid=',urlencode($pid),'">';
		?>
		<div class="previous_work">
			<div class="pwork">
				<div class="baseImage">
				<?php
					echo '<img src="data:image;base64,'.$row["IMAGE1"].'">';
				?>
				</div>
				<div class="imgDescription">
						<div class="sitelabel"><?php echo $row['P_NAME']  ?></div><br />
						<?php //$_SESSION['PROJECT_ID']= $row['PROJECT_ID']; 
							echo $row['P_DESCRIPTION'];
							echo("<br/><br/><br/><br/>");
						?>
				</div>
			</div>
		</div>
	<?php	echo "</a>";   
		}
		?>  
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