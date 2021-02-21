<?php
	session_start();
	unset($_SESSION['student']);
	echo "<script>alert('Successfully logged out.');</script>"
?>