<?php
	
	session_start();

	if(!isset($_SESSION['student'])){
		//header(); redirect to that page if not login
		echo "<script>
				alert('Your are not logged in.');
				window.location.href='student_login.php';
		</script>";
	}
?>