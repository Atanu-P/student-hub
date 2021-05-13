<?php
	require 'session_validator.php';
	require_once 'conn.php';

	# admin videocall page
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
	
  	<?php
	include_once "nav_admin.php";
	?>


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