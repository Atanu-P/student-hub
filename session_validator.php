<?php
	session_start();

	if(!ISSET($_SESSION['admin'])){
		header("location: index.php");
	}
	//if session variable not set it redirect to index page(login form)
?>