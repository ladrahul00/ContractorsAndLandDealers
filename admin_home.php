<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="admin/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="admin/css/style.css">
		<link rel="stylesheet" href="admin/css/site_info_css.css">		<!-- Gem style -->
		<script src="admin/js/modernizr.js"></script> <!-- Modernizr -->
		<script type="text/javascript" src="admin/js/jquery.cycle.all.js"></script> 

		<title>Converge: Contractor's group</title>
			  
	</head>
<body>
	<header role="converge">
	<div align="left"><a href="admin_home.php"><h1 class="toptitle">CONVERGE</h1></a></div>
	</header>
	<div class="nav-bar">
		<nav class="main-nav">
		<div class="greeting">
			Hello Admin
		</div>
		<div class="buttons">
			<ul align="right">
			<li><a class="cd-signin" href="index.html">Log Out</a></li>
			</ul>
		</div>
		</nav>
	</div>	
	<div class="one">
		
	</div>
	<div class="two">
		<div class="attadmin">
			<ul>
			<li><a href="admin_contractor_addinfo.php"><div class="cwork">Add Site Information</div></a></li>
			<li><a href="admin_contractor_updateinfo.php"><div class="cwork">Update site information</div></a></li>
			<li><a href="search_contractor.php"><div class="cwork">Search for contracor</div></a></li>
		</div>
		<br>
		Search for contractor :: 
		<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" enctype="multipart/form-data">
		<!--<form action=""  method="POST" class="search-form frame inbtn rlarge">-->
			<input type="text" name="c_email" class="search-input" placeholder="Search for Contractor .." />
			<input class="search-btn" type="submit" name="search" value="Go" />        
		</form>
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
<?php
mysql_connect('localhost','root','')OR die('Could not connect to MySQL: ' .mysqli_connect_error());
mysql_select_db('jarvis');
session_start();
if(isset($_POST["search"]))
    {
		$c_email=$_POST['c_email'];
		$_SESSION['c_email']=$c_email;
		
           if( empty($c_email))
               {
                  echo "<script> alert( 'Please provide Contractor's Valid Email ID!' ); </script>";
               }
	       else
	           {    
		         $query=mysql_query("SELECT * FROM users WHERE EMAIL='$c_email'") or die("Invalid Query".mysql_error());
		         $row=mysql_fetch_array($query);
		         $login_email=$row['EMAIL'];
		         if(mysql_num_rows($query)!=0)
					{
						if(isset($login_email))
							header("Location:admin_contractor_profile.php");
				    }
				 else
					 echo '<script> alert("Invalid Contractor Email Entered. Enter Again");</script>';
	            }
    }
?>


