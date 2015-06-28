<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="update_info/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="update_info/css/style.css"> <!-- Gem style -->
		<link rel="stylesheet" href="update_info/css/site_info_css.css">
		<script src="js/modernizr.js"></script> <!-- Modernizr -->
	    <!--<link rel="stylesheet" href="css/style.css"> <!-- CSS reset -->
		<script type="text/javascript" src="update_info/js/jquery.cycle.all.js"></script> 
		<title>Converge: Contractor's group</title>
		
		
	</head>
<body>
	<header role="converge">
	<div align="left"><a href="admin_home.php"><h1 class="toptitle">CONVERGE</h1><!img src="logo.png" id="main-logo"></a></div>
	</header>
		<div class="nav-bar">
		<nav class="main-nav">
		<div class="greeting">
			Hello Admin
		</div>
		<div class="buttons">
			<ul align="right">
			<li><a class="cd-signin" href="index.html">Logout</a></li>
			</ul>
		</div>
		</nav>
	</div>	
	
	<div id="box">
	   <br><br>
		<div class="search-bar" align="center">
		Search For site :: 
		<form action=""  method="POST" class="search-form frame inbtn rlarge">
			<input type="text" name="search" class="search-input" placeholder="Search by site name.." />
			<input class="search-btn" type="submit" name="sitesearch" value="Go" />        
		</form>
		
		<!--Search for contractor :: 
		
		<form action=""  method="POST" class="search-form frame inbtn rlarge">
			<input type="text" name="search" class="search-input" placeholder="Search for Contractor .." />
			<input class="search-btn" type="submit" name="contrasearch" value="Go" />        
		</form> -->
		
		</div>
		<div style="margin-top:33%">
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
	</div>
</body>
<?php

  mysql_connect('localhost','root','')OR die('Could not connect to MySQL: ' .mysqli_connect_error());
  mysql_select_db('jarvis');
  session_start();
 

    if(isset($_POST["sitesearch"]))
      {
		$site_name=$_POST['search'];
		$_SESSION['site_name']=$site_name;
		
           if( empty($site_name))
              {
                  echo "<script>alert( 'Please provide site name !' ); </script>";
               }
	       else
	          {    
		         $query=mysql_query("SELECT * FROM project WHERE P_NAME='$site_name'") or die("Invalid Query".mysql_error());
		         $row=mysql_fetch_array($query);
		         $login_session=$row['site_name'];
		         if(mysql_num_rows($query)!=0)
				 {
		           if(!isset($login_session))
			          header("Location:update_site_info.php");
				 }
				 else
					 echo '<script> alert("Invalid Site Name Enter Again");</script>';
	           }
       }
	   
	   
   /* if(isset($_POST["contrasearch"]))
      {
		$c_email=$_POST['search'];
		$_SESSION['c_email']=$c_email;
		
           if( empty($c_email))
              {
                  echo "<script>alert( 'Please provide Contractor's Valid Email ID!' ); </script>";
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
*/

 ?>
 </html>