<?php
	session_start();
	$_SESSION['id_user']=0;
	header("Location: login.php");
	die();
?>

