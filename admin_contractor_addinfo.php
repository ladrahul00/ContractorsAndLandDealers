<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="admin_contractor_addinfo/css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="admin_contractor_addinfo/css/style.css"> <!-- Gem style -->
		<script src="js/modernizr.js"></script> <!-- Modernizr -->
		<script type="text/javascript" src="admin_contractor_addinfo/js/jquery.cycle.all.js"></script> 
		<title>Converge: Contractor's group</title>
		<link rel="stylesheet" href="admin_contractor_addinfo/css/site_info_css.css">
		
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
			<li><a class="cd-signin" href="logout.php">Logout</a></li>
			</ul>
		</div>
		</nav>
	</div>	
	<div class="box">
	<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" enctype="multipart/form-data">
	<table align="center" cellpadding="5" cellspacing="10" >
	<tr><th>
	 Site ID :&nbsp&nbsp</th>
	 <th><input type="number" name="site_id" ><br><br></th></tr>
	
	<tr><th>
	 Site Name :&nbsp&nbsp</th>
	 <th><input type="text" name="site_name" ><br><br></th></tr>
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
	 <th><textarea name="site_description" rows="2" cols="20" ></textarea><br><br></th></tr>
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

	if(isset($_POST["Submit"]))
	{
		$site_id=$_POST['site_id'];
		$site_name=$_POST['site_name'];
		$site_description=$_POST['site_description'];
		$site_status=$_POST['site_status'];
		$DOS=$_POST['DOS'];
		$DOF=$_POST['DOF'];
		if($_POST['c_email'] != "" )
		{  $var=$_POST['c_email'];
			$res=mysql_query("SELECT * FROM users WHERE EMAIL='$var' AND UTYPE='C' ") or die(mysql_error());
			if(mysql_num_rows($res)==1) 
				{
					  $c_email=$_POST['c_email'];
				}
			else
			 echo'<script> alert("Provided conntractor email does not exists"); window.location.href="admin_home.html";</script>';
		}
		//$c_email=$_POST['c_email'];
		$bhk=$_POST['bhk'];
		$locality=$_POST['locality'];
		if( empty($site_id) || empty($site_name)|| empty($site_status)|| empty($site_description) || empty($DOS) || empty($DOF) || empty($c_email) || empty($bhk) || empty($locality))
		{
			echo "<script> alert( 'All the fields are compulsory!' ); </script>";
		}

		{
		$q=mysql_query("INSERT INTO project (PROJECT_ID,P_NAME,BHK,P_DESCRIPTION,START,FINISH,LOCALITY,STATUS,C_EMAIL)VALUES('$site_id','$site_name','$bhk','$site_description','$DOS','$DOF','$locality','$site_status','$c_email')") or die ("Invalid Query".mysql_error());
		if(!$q)
		{
			echo "<script>alert('Failed to add Site Information!');//window.location.href='admin_home.php';</script>";
		}
		else
			echo"<script>alert('Site Information Added Successfully!');//window.location.href='admin_home.php';</script>";
           
		}
		$name=addslashes($_FILES['file1']['name']);
		$image=addslashes($_FILES['file1']['tmp_name']);
		$image=file_get_contents($image);
		$image=base64_encode($image);
		echo $image;
		$target_path = "images/".$name;
		$up=move_uploaded_file($_FILES['file1']['tmp_name'],$target_path);
		echo $up;
		$q=mysql_query("UPDATE project SET IMAGE1='{$image}' WHERE PROJECT_ID='$site_id'") or die (mysql_error());	
		echo $q;
		echo"<br/><br/><br/><br/><br/><br/><br/><br/>";
		if(!$up) 
		{
			echo'<script> alert("image not uploaded!");</script>';
		}
		if(!$q)
		{
			echo'<script> alert("Image not stored!");</script>';
		}
		else
			echo "<script> alert( 'Image stored and uploaded successfullys!' ); </script>";          

		$name=addslashes($_FILES['file2']['name']);
		$image=addslashes($_FILES['file2']['tmp_name']);
		$image=file_get_contents($image);
		$image=base64_encode($image);
		echo $image;
		$target_path = "images/".$name;
		$up=move_uploaded_file($_FILES['file2']['tmp_name'],$target_path);
		echo $up;
		$q=mysql_query("UPDATE project SET IMAGE2='{$image}' WHERE PROJECT_ID='$site_id'") or die (mysql_error());	
		echo $q;
		echo"<br/><br/><br/><br/><br/><br/><br/><br/>";
		if(!$up) 
		{
			echo'<script> alert("image not uploaded!");</script>';
		}
		if(!$q)
		{
			echo'<script> alert("Image not stored!");</script>';
		}
		else
			echo "<script> alert( 'Image stored and uploaded successfullys!' ); </script>";          

		$name=addslashes($_FILES['file3']['name']);
		$image=addslashes($_FILES['file3']['tmp_name']);
		$image=file_get_contents($image);
		$image=base64_encode($image);
		echo $image;
		$target_path = "images/".$name;
		$up=move_uploaded_file($_FILES['file3']['tmp_name'],$target_path);
		echo $up;
		$q=mysql_query("UPDATE project SET IMAGE3='{$image}' WHERE PROJECT_ID='$site_id'") or die (mysql_error());	
		echo $q;
		echo"<br/><br/><br/><br/><br/><br/><br/><br/>";
		if(!$up) 
		{
			echo'<script> alert("image not uploaded!");</script>';
		}
		if(!$q)
		{
			echo'<script> alert("Image not stored!");</script>';
		}
		else
			echo "<script> alert( 'Image stored and uploaded successfullys!' ); </script>";          
	}   
?>
</html>