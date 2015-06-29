<?php 
//Grab User submitted information
include('lock.php');
//session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$email = $_POST["email"];
$pass = $_POST["password"];

$q = "SELECT * FROM users WHERE EMAIL='$email' AND PASSWORD='$pass'";
$result=mysqli_query($dbc,$q);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($result->num_rows>0)
{
	$_SESSION['USERNAME']=$row['USERNAME'];
	$_SESSION['email'] = $email;
	if(strcmp($email,"admin@converge.com")==0)
	{	
		echo $email;
		header("Location:admin_home.php");
	}
	else
	{
	if($row['UTYPE']=='C')
		header("Location:contractor_profile.php");
	else
		header("Location:user_home.php");
	}	
}
else {
	echo "";
	$errorMessage = "Invalid Login";
	echo "<script>alert('Unsuccesful login');window.location.href='index.html';</script>";
	}
}
?>