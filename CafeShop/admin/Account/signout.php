<?php session_start();
  	session_destroy();
  	setcookie("remembername", "", time() - 3600);
  	setcookie("rememberpass", "", time() - 3600);
  	header("location: login.php"); 	
 ?>