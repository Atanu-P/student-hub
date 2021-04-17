<?php  
	session_start();

	if(!isset($_SESSION['student'])){
		//header(); redirect to that page if not login
		echo "<script>
				alert('Your are not logged in.');
				window.location.href='student_login.php';
		</script>";
	}
	require_once 'conn.php'; //db connection
	# student videocall page
?>
<body>
	<div id="otEmbedContainer" style="width:800px; height:640px"></div>
                    <script src="https://tokbox.com/embed/embed/ot-embed.js?embedId=d4126eda-a9bd-493a-b09d-5734d8ca0d50&room=DEFAULT_ROOM"></script>
</body>