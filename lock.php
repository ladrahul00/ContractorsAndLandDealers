<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'jarvis');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

session_start();

$user_check=$_SESSION['email'];

$ses_sql=mysqli_query($dbc,"SELECT * FROM USERS WHERE EMAIL='$user_check'");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['USERNAME'];
$login_email=$row['EMAIL'];
$login_utype=$row['UTYPE'];


if(!isset($login_session))
{
header("Location: index.html");
}
?>