<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="update_site_info/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="update_site_info/css/style.css"> <!-- Gem style -->
		<script src="js/modernizr.js"></script> <!-- Modernizr -->
		<script type="text/javascript" src="update_site_info/js/jquery.cycle.all.js"></script> 
		<title>Converge: Contractor's group</title>
		<!--<link rel="stylesheet" href="update_site_info/css/site_info_css.css">-->
		<link rel="stylesheet" href="update_site_info/css/site_info_css.css">
	</head>
<body>
<?php
session_start();
$site_name=$_SESSION['site_name'];
?>
	<header role="converge">
	<div align="left"><a href="#"><h1 class="toptitle">CONVERGE</h1><!img src="logo.png" id="main-logo"></a></div>
	</header>
		<div class="nav-bar">
		<nav class="main-nav">
		<div class="greeting">
			Hello Admin
		</div>
		<div class="buttons">
			<ul align="right">
			<li><a class="cd-signin" href="logout.php">Logout</a></li>
			</ul>
		</div>
		</nav>
	</div>	
	<div class="box">
	<?php
	 echo '<h1 align="center"> Update Information About  ';
	 echo $site_name;
	 echo ' </h1><br><br>';
	 ?>
    <!--<form method="POST">-->
	<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" enctype="multipart/form-data">
	<table align="center" >
	<tr><th>
	 Site Status  :&nbsp&nbsp</th>
	 <th>
	 <!--<input type="text" name="site_status" >-->
	 <select name="site_status">
	  <option value="">Select Status </option>
	   <option value="completed">Completed</option>
	   <option value="current">Current</option>
	  </select>
	 
	 <br><br></th></tr>
	 <tr><th>
	  Site Description :&nbsp&nbsp</th>
	 <th><textarea name="site_description" rows="2" cols="19" ></textarea><br><br></th></tr>
	 <tr><th>
	 Date of Start :&nbsp&nbsp</th>
	 <th><input type="date" name="DOS" ><br><br></th></tr>
	 	 <tr><th>
	 Date of Finish :&nbsp&nbsp</th>
	 <th><input type="date" name="DOF" ><br><br></th></tr>
	  <tr><th>
	  Locality :&nbsp&nbsp</th>
	 <th>
	 
	 <select name="locality">
		<option value="" selected="selected">  Select Locality  </option>
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
	 
	 <br><br></th></tr>
	  <tr><th>
	 BHK:&nbsp&nbsp</th>
	 <th>
	 
	 <select name="bhk">
		<option value="" selected="selected">  BHK  </option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="3.5">3.5</option>
		<option value="4">4</option>
	</select>
	 
	 <br><br></th></tr>
	  <tr><th>
	  Contractor Email :&nbsp&nbsp</th>
	  <th><input type="email" name="c_email"><br><br></th></tr>
	  <tr><th>Site Image 1 :&nbsp&nbsp</th>
	 <th><input type="file" name="file1"><br><br></th></tr>
	 <tr><th></th>
	 
	 <tr><th>Site Image 2 :&nbsp&nbsp</th>
	 <th><input type="file" name="file2"><br><br></th></tr>
	 <tr><th></th>
	 
	 <tr><th>Site Image 3 :&nbsp&nbsp</th>
	 <th><input type="file" name="file3"><br><br></th></tr>
	 <tr><th></th>
	<th> <input type="Submit" name="Submit" value="Submit" ></th></tr>
	 </table>
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
<?php

  mysql_connect('localhost','root','')OR die('Could not connect to MySQL: ' .mysqli_connect_error());
  mysql_select_db('jarvis');

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    if(isset($_POST["Submit"]))
    {
   
    $query=mysql_query("Select * from project where P_NAME='$site_name'");
	while($row=mysql_fetch_array($query))
		{
	    $site_description=$row['P_DESCRIPTION'];
		$site_status=$row['STATUS'];
		$DOS=$row['START'];
		$DOF=$row['FINISH'];
  		$c_email=$row['C_EMAIL'];
        $bhk=$row['BHK'];
        $locality=$row['LOCALITY'];
		}
    if($_POST['site_description'] != "")	
       $site_description=$_POST['site_description'];
	if($_POST['site_status'] != "")	
         $site_status=$_POST['site_status'];
    if($_POST['DOS'] != "")	
       $DOS=$_POST['DOS'];
	if($_POST['DOF'] != "")	
         $DOF=$_POST['DOF'];
	if($_POST['c_email'] != "" )
		{  $var=$_POST['c_email'];
			$res=mysql_query("SELECT * FROM users WHERE EMAIL='$var' AND UTYPE='C' ") or die(mysql_error());
			if(mysql_num_rows($res)==1) 
				{
					  $c_email=$_POST['c_email'];
				}
			else
			 echo'<script> alert("Provided conntractor email does not exists"); window.location.href="admin_home.php";</script>';
		}
       
    if($_POST['bhk'] != "")	  
       $bhk=$_POST['bhk'];
    if($_POST['locality'] != "")	
      $locality=$_POST['locality'];	  
	  
    $q=mysql_query("UPDATE project SET BHK={$bhk},P_DESCRIPTION='{$site_description}',START='{$DOS}',FINISH='{$DOF}',LOCALITY='{$locality}',STATUS='{$site_status}',C_EMAIL='{$c_email}' WHERE P_NAME='{$site_name}'") or die("Invalid query".mysql_error());
    if(!$q )
				 echo "<script>alert('Site Information Could not be updated!');</script>";
     //   echo "<script>alert('Failed to Update Site Information!');window.location.href='admin_home.php';</script>";
    else if(mysql_num_rows($res)==1)
		 echo "<script>alert('Site Information Updated Successfully!');</script>";
//	    echo "<script>alert('Site Information Updated Successfully!');window.location.href='admin_home.php';</script>";
           
	//jayti
		$name=addslashes($_FILES['file1']['name']);
		$image=addslashes($_FILES['file1']['tmp_name']);
		$image=file_get_contents($image);
		$image=base64_encode($image);
//		echo $image;
		$target_path = "images/".$name;
		$up=move_uploaded_file($_FILES['file1']['tmp_name'],$target_path);
		echo $up;
		$q2=mysql_query("UPDATE project SET IMAGE1='{$image}' WHERE P_NAME='{$site_name}'") or die (mysql_error());	
	//	echo $q;
		echo"<br/><br/><br/><br/><br/><br/><br/><br/>";
		if(!$up) 
		{
			echo'<script> alert("image not uploaded!");</script>';
		}
		if(!$q2)
		{
			echo'<script> alert("Image not stored!");</script>';
		}
		$name=addslashes($_FILES['file2']['name']);
		$image=addslashes($_FILES['file2']['tmp_name']);
		$image=file_get_contents($image);
		$image=base64_encode($image);
	//	echo $image;
		$target_path = "images/".$name;
		$up=move_uploaded_file($_FILES['file2']['tmp_name'],$target_path);
		//echo $up;
		$q2=mysql_query("UPDATE project SET IMAGE2='{$image}'  WHERE P_NAME='{$site_name}'") or die (mysql_error());	
		//echo $q2;
		//echo"<br/><br/><br/><br/><br/><br/><br/><br/>";
		if(!$up) 
		{
			echo'<script> alert("image not uploaded!");</script>';
		}
		if(!$q2)
		{
			echo'<script> alert("Image not stored!");</script>';
		}
		
		$name=addslashes($_FILES['file3']['name']);
		$image=addslashes($_FILES['file3']['tmp_name']);
		$image=file_get_contents($image);
		$image=base64_encode($image);
		//echo $image;
		$target_path = "images/".$name;
		$up=move_uploaded_file($_FILES['file3']['tmp_name'],$target_path);
		//echo $up;
		$q2=mysql_query("UPDATE project SET IMAGE3='{$image}' WHERE P_NAME='{$site_name}'") or die (mysql_error());
		//echo"<br/><br/><br/><br/><br/><br/><br/><br/>";
		if(!$up) 
		{
			echo'<script> alert("image not uploaded!");</script>';
		}
		if(!$q2)
		{
			echo'<script> alert("Image not stored!");</script>';
		}
	}   
	}
		
 
	
  
?>
</html>