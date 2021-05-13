<?php
	require 'session_validator.php';
	require_once 'conn.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include "stylesheet.php";?>
    <style type="text/css">
		table.dataTable thead .sorting:after,
		table.dataTable thead .sorting:before,
		table.dataTable thead .sorting_asc:after,
		table.dataTable thead .sorting_asc:before,
		table.dataTable thead .sorting_asc_disabled:after,
		table.dataTable thead .sorting_asc_disabled:before,
		table.dataTable thead .sorting_desc:after,
		table.dataTable thead .sorting_desc:before,
		table.dataTable thead .sorting_desc_disabled:after,
		table.dataTable thead .sorting_desc_disabled:before {
		bottom: .5em;
		}
    </style>

    <title>S-Hub | Welcome</title>
  </head>
  <body>

	<?php
	include_once "nav_admin.php";
	?>

	<div class="container">
	<div class="card p-4 mb-4">
	<div class="row">
	<div class="col">
		<h4 class="card-title text-center ">Welecome <?= ucfirst($_SESSION['username']) ?></h4>
		<?php
			if($_SESSION['status'] == 'admin'){
		?>
		
		<p class="note note-primary">As an admin you can add new admin/ teacher or delete them .you can later change the role of admin in Add admin button.</p>
		<p class="note note-secondary">You can change your admin password and username.<p>
		<?php
			}else{
		?>
		<p class="note note-primary">As a teacher you can change your password and username.<p>

		<?php
			}
		?>	
		<p class="note note-secondary">You can register a new student and later update student details in the student tab. you can view student assignment which is upload by the student.</p>
		<p class="note note-primary">You can upload new study material for the student in the study material tab or view material uploaded by other admin or teacher.</p>
	</div>
	</div>
	</div>
	</div>

	<?php include "script.php";?>

</body>
</html>
