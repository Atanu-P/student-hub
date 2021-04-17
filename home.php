<?php
	require 'session_validator.php';
	require_once 'conn.php';
?>

<h1>Home page</h1>
<button><a href="logout.php" onclick="if(confirm('Are you sure you want to logout ?')) return true; else return false;">Logout</a></button>
<button><a href="reset_pass.php" onclick="if(confirm('Are you sure you want to change the password ?')) return true; else return false;">Change Password</a></button>
