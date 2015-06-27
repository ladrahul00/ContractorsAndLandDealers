
<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'jarvis');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser
include("searchresult.php");

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	/*$key = $_POST['local_name'];
	$bhk = $_POST['nbhk'];*/
	//echo $key;
$key=a;
 if (isset($_POST['go'])) 
 { 
	$q = "SELECT * FROM project where PROJECT_ID='".$key."'";
	$result = mysqli_query($dbc,$q); 
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	$_SESSION['PROJECT_ID']=$row['PROJECT_ID'];
	//echo $_SESSION['PROJECT_ID'];
	$_SESSION['DESCRIPTION']=$row['P_DESCRIPTION'];
	header("Location:site.php");

}
	else
		echo "Not set";
}
?>
