<?php
	session_start();

	if(!isset($_SESSION['student'])){
		//header(); redirect to that page if not login
		echo "<script>
				alert('Your are not logged in.');
				window.location.href='student_login.php';
		</script>";
	}
	require "conn.php";
	# view study material in table formate
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

    <title>S-Hub | Study Material</title>
  </head>
  <body>

  	<?php include_once "nav_stu.php"; ?>

<?php
	$select = "select * from student where id='$_SESSION[student]'";
	$query = mysqli_query($con, $select);
	$fetch = mysqli_fetch_array($query);
?>

<div class="container mt-4">
	<div class="card p-4 mb-4">
		<div class="row">
		<div class="col">
		<h4 class="card-title text-center">Study Material</h4>
			<table class="table table-striped table-bordered table-sm" id="study_material">
				<thead class="thead-dark">
					<tr align="center">
					<th>Date</th>
					<th>Title</th>
					<th>Course</th>
					<th>Upload by</th>
					<th>Download</th>
					</tr>	
				</thead>
				<tbody>
					<?php
						$select = "select * from material";
						$query = mysqli_query($con, $select);
						while($fetch = mysqli_fetch_array($query)){
					?>
					<tr align="center">
						<td><?= date_format(date_create($fetch['date']),"d-m-Y")?></td>
						<td><?= $fetch['title']?></td>
						<td><?= $fetch['c_id']?></td>
						<td><?= $fetch['upload_by']?></td>
						<td><a href="download_study_material.php?id=<?= $fetch['id']?>" class="btn btn-sm btn-mdb-color"><i class="fas fa-download"></i></a></td>		
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>

<?php include "script.php";?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#study_material').DataTable();
		$('.dataTables_length').addClass('bs-select');

		
	});
</script>
</body>
</html>