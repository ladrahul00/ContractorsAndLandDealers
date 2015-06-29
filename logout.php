<?php
//if(session_status() === PHP_SESSION_ACTIVE){
	include('lock.php');
	$_SESSION['USERNAME']="GUEST";
    $_SESSION = array();
    session_unset();
    session_destroy();
	//exit();
	echo"<script>alert('Succesfull logout');window.location.href='index.html';</script>";

?>