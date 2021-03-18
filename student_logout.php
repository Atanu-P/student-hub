<?php
	//student logout page
	session_start();
	unset($_SESSION['student']); 
	echo "<script>
			alert('Successfully logged out.');
			window.location.href='student_login.php';
	</script>";
	//header(); redirect to page after logout
?>
