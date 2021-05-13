<?php
	//student logout page
	session_start();
	unset($_SESSION['student']); 
	unset($_SESSION['name']);
	echo "<script>
			alert('Successfully logged out.');
			window.location.href='index.php';
	</script>";
	//header(); redirect to page after logout
?>
