<?php 
//Grab User submitted information

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'jarvis');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
session_start();
$user_check=$_SESSION['email'];


if($_SERVER["REQUEST_METHOD"] == "POST")
{
$email = $_POST["email"];
$pass = $_POST["password"];

$q = "SELECT * FROM users WHERE EMAIL='$email' AND PASSWORD='$pass'";
$result=mysqli_query($dbc,$q);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$login_session=$row['USERNAME'];
//echo $login_session;
if($result->num_rows>0)
{
	echo "SUCCESSFUL LOGIN!!";
	$_SESSION['email'] = $email;
	if(strcmp($email,"admin@converge.com")==0)
	{	
		echo $email;
		header("Location:admin_home.html");
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