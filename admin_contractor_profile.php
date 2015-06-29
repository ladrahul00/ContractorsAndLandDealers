<?php
include('lock.php');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser
//session_start();

	$status1 = "completed";
	$status2 = "current";
	$c_email=$_SESSION['c_email'];
	$q = "SELECT * FROM PROJECT where C_EMAIL='".$c_email."' AND STATUS='".$status1."'";
	$result1 = mysqli_query($dbc,$q); 
	$r = "SELECT * FROM PROJECT where C_EMAIL='".$c_email."' AND STATUS='".$status2."'";
	$result2 = mysqli_query($dbc,$r);

?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="admin_contractor_profile/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="admin_contractor_profile/css/style.css"> <!-- Gem style -->
		<script src="admin_contractor_profile/js/modernizr.js"></script> <!-- Modernizr -->
		<script type="text/javascript" src="admin_contractor_profile/js/jquery.cycle.all.js"></script> 

		<title>Converge: Contractor's group</title>
	</head>
	<body>
	<header role="converge">
	<div align="left"><a href="admin_home.php"><h1 class="toptitle">CONVERGE</h1></a></div>
	</header>
	<div class="nav-bar">
		<nav class="main-nav">
		<div class="greeting">
			Hello <?php echo $_SESSION['USERNAME']; ?>
		</div>
		<div class="buttons">
			<ul align="right">
			<li><a class="cd-signin" href="logout.php">Log Out</a></li>
			</ul>
		</div>
		</nav>
	</div>
	<div class="contraname">
	Contractor Email: <?php echo $c_email; ?><br/>
	</div>
	<div class="one">
	</div>
	<div class="two">
	<label>Completed :: </label>
	<?php   
		while($row1=$result1->fetch_assoc())
		{ 
			$baby=$row1['PROJECT_ID'];
		echo '<a href="sitecontractor.php?baby=',urlencode($baby),'">';
		?>
		<div class="completed_work">
			<div class="pwork">
				<div class="baseImage">
				<!--<img src="contractor/images/img1.jpg"">-->
				<?php
				if(isset($row1["IMAGE1"]))
					echo '<img src="data:image;base64,'.$row1["IMAGE1"].'">';
				?>
				</div>
				<div class="imgDescription">
						<div class="sitelabel">
						<?php echo $row1['P_NAME']; ?>
						</div><br />
						<?php
							$_SESSION['desc']=$row1['P_DESCRIPTION'];
							$_SESSION['status']=$status1;	
							$_SESSION['P_NAME']= $row1['P_NAME'];
							echo $row1['P_DESCRIPTION'];
							echo("<br/><br/><br/><br/>")
						?>
						</div>
			</div>
		</div>
	<?php echo"</a>";
  
		}
		?>  
	</div>
	<div class="two">
	<label>Ongoing :: </label>
	<?php   
		while($row2=$result2->fetch_assoc())
		{ 
		$baby=$row2['PROJECT_ID'];
		echo '<a href="sitecontractor.php?baby=',urlencode($baby),'">';
		?>
		<div class="previous_work">
			<div class="pwork">
				<div class="baseImage">
				<img src="contractor/images/img1.jpg" height="75px" width="90px">
				</div>
				<div class="imgDescription">
					<div class="sitelabel">
					<?php echo $row2['P_NAME']; ?>
					</div><br />
					<?php 
						$_SESSION['desc']=$row2['P_DESCRIPTION'];
						$_SESSION['status']=$status2;
						echo $row2['P_DESCRIPTION'];
						echo("<br/><br/><br/><br/>")
					?>
				</div>
			</div>
		</div>
		<?php  echo"</a>";
		}
		?>  
	</div>
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

			<p>Company Name &copy; 2015</p>
		</div>

		</footer>

</body>
</html>