<?php

include('lock.php');
// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

//session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$key = $_POST['local_name'];
	$bhk = $_POST['nbhk'];
	//echo $key;

 if (isset($_POST['go'])) 
 { 
	$q = "SELECT * FROM project where LOCALITY='".$key."' AND BHK='".$bhk."'";
	$result = mysqli_query($dbc,$q); 
	//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	//$n=$result->num_rows;
	//$_SESSION['PROJECT_ID']=$row['PROJECT_ID'];
	//echo $_SESSION['PROJECT_ID'];
	//$_SESSION['DESCRIPTION']=$row['P_DESCRIPTION'];
	//header("Location:searchresult.php");

}
	else
		echo "Not set";
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
	<div align="left"><a href="index.html"><h1 class="toptitle">CONVERGE</h1></a></div>
	</header>
	<div class="nav-bar">
		<nav class="main-nav">
				<div class="greeting">
			Hello <?php echo $login_session; ?>
		</div>
		<div class="buttons">
			<ul align="right">
			<li><a class="cd-signin" href="index.html">Log Out</a></li>
			</ul>
		</div>
		</nav>
	</div>	
	<div class="one"></div>
	<div class="two">
	<label>Search Results :: </label>
	<?php   
//		session_start();
		//for($x=0;$x<$n;$x++)
		while($row=$result->fetch_assoc())
		{ 
		//$_SESSION['PROJECT_ID']= $row['PROJECT_ID'];
		//$_SESSION['P_NAME']= $row['P_NAME'];
		//header("Location:site.php");
		$baby=$row['PROJECT_ID'];
		echo '<a href="site.php?baby=',urlencode($baby),'">';
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