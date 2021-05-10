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

    <title>S-Hub | View Assignment</title>
  </head>
  <body>

	<?php
	include_once "nav_admin.php";
	?>

<div class="container">
	<div class="card p-4 mb-4">
	<div class="row">
	<div class="col">
		<h5 class="card-title text-center">View assignments submitted by student</h5>
		<table id="viewAssignment"  class="table table-striped table-bordered table-sm" >
			<thead class="thead-dark">
				<tr align="center">
					<th>Date</th>
					<th>Student Id</th>
					<th>Student name</th>
					<th>Course Name</th>
					<th>Filename</th>
					<th>Download</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$select = "select * from storage";
					$query = mysqli_query($con, $select);
					while ($fetch = mysqli_fetch_array($query)) {
				?>
				<tr align="center">
					<td><?= $fetch['date']?></td>
					<td><?= $fetch['s_id']?></td>
					<td><?= $fetch['s_name']?></td>
					<td><?= $fetch['c_id']?></td>
					<td><?= $fetch['filename']?></td>
					<td> <a href="download.php?f_id=<?= $fetch['f_id']?>" class="btn btn-sm btn-grey"><i class="fas fa-download"></i></a> </td>
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
		$('#viewAssignment').DataTable();
		$('.dataTables_length').addClass('bs-select');

		$('#adminNavbar .navbar-nav a').on('click', function(){
			$('#adminNavbar .navbar-nav').find('li.active').removeClass('active');
			$(this).parent('li').addClass('active');
		});
	});
</script>
</body>
</html>