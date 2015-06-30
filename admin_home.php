<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="admin_home/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="admin_home/css/style.css">
		<link rel="stylesheet" href="admin_home/css/site_info_css.css">		<!-- Gem style -->
		<script src="admin/js/modernizr.js"></script> <!-- Modernizr -->
		<script type="text/javascript" src="admin_home/js/jquery.cycle.all.js"></script> 

		<script>
		$(document).ready(function(){
			$('a').click(function () {
				var divname= this.name;
				$("#"+divname).show("slow").siblings().hide('slow');
				  
		   });
		});
		</script> 
		
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
			<li><a class="cd-signin" href="logout.php">Log Out</a></li>
			</ul>
		</div>
		</nav>
	</div>
	<div class="one"></div>	
	<div class="two">
		<div class="attadmin">
			<ul>
			<li><a href="admin_contractor_addinfo.php"><div class="cwork">Add Site Information</div></a></li>
			<li><a href="#" name="search_site"><div class="cwork">Update site information</div></a></li>
			<li><a href="#" name="search_contractor"> <div class="cwork">Search for contractor</div></a></li>
		</div>
	</div>
	
	
	<div class="search">
		<div id="search_contractor" style="display:none">
		<table align="center">
		<tr><b>SEARCH FOR CONTRACTOR</b></br></br></tr>
		<tr><th>
			Contractor Email :&nbsp&nbsp</th>
			<form action=""  method="post" class="search-form frame inbtn rlarge">
				<th><input type="text" name="c_email" class="search-input" placeholder="Search for Contractor .." /></th>
				<th><input class="search-btn" type="submit" name="search" value="Go" />  </th></tr>      
			</form>
		</table>
		</div>
		<div id="search_site" style="display:none">
		<table align="center">
		<tr><b>SEARCH FOR SITE</b></br></br></tr>
		<tr><th>Site Name :&nbsp&nbsp</th>
			<form action=""  method="post" class="search-form frame inbtn rlarge">
				<th><input type="text" name="site" class="search-input" placeholder="Search by site name .." /></th>
				<th><input class="search-btn" type="submit" name="sitesearch" value="Go" /></th></tr>     
			</form>
		</table>
		</div>			
	</div>

 	<footer class="footer-distributed" >
		<div class="footer-left">
			<p class="footer-links" align="right">
					<a href="index.html">Home</a>
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
		         $_SESSION['email']=$row['EMAIL'];
				 $_SESSION['USERNAME']="admin";
		         if(mysql_num_rows($query)!=0)
					{
						if(isset($_SESSION['email']))
							header("Location:contractor_profile.php");
				    }
				 else
					 echo '<script> alert("Invalid Contractor Email Entered. Enter Again");</script>';
	            }
    }
	if(isset($_POST["sitesearch"]))
    {
		$site_name=$_POST['site'];
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
?>


