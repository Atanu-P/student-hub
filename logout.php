<?php
	session_start();
	unset($_SESSION['admin']);
	unset($_SESSION['status']);
	unset($_SESSION['username']);
	header("location: index.php");
	echo "<script> alert('Successfully logout.');</script>";
?>