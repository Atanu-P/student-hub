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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include "stylesheet.php";?>
    

    <title>S-Hub | Video Chat</title>
  </head>
  <body>

  	<?php include_once "nav_stu.php"; ?>

  	<div class="container mt-4">
		<div class="card p-2 ">
			<div class="row ">
			<div class="col ">
				<div id="otEmbedContainer" style="width:900px; height:600px" class="mx-auto"></div>
            </div>
     		</div>
     	</div>
 	</div>


<?php include "script.php";?>
<script src="https://tokbox.com/embed/embed/ot-embed.js?embedId=d4126eda-a9bd-493a-b09d-5734d8ca0d50&room=DEFAULT_ROOM"></script>
</body>
</html>