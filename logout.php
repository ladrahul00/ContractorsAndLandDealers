<?php
session_start();
if(session_destroy())
{
	echo "SUCCESSFUL LOGOUT!!";
	header("Location: index.html");
}
?>