<?php
	require 'session_validator.php';
	require_once 'conn.php';

	$id = $_GET['id'];
	$fname = $_GET['fname'];

	$query = mysqli_query($con, "select * from student where id='$id'");
	$fetch_detail = mysqli_fetch_array($query);
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

    <title>S-Hub | <?= $fetch_detail['fname'].'-'.$fetch_detail['lname']?>'s Assignment</title>
  </head>
  <body>

	<?php
	include_once "nav_admin.php";
	?>	

	<div class="container">
	<div class="card p-4 mb-4">
		<div class="row">
		<div class="col" align="center">
		<h4 class="card-title text-center"><?= $fetch_detail['fname'].'-'.$fetch_detail['lname']?></h4>
					
		<table class="table table-striped table-bordered table-sm">
			<thead class="thead-dark">
				<tr align="center">
					<th class="th-sm">Stu Id</th>
					<th class="th-sm">Firstame</th>
					<th class="th-sm">Lastname</th>
					<th class="th-sm">Gender</th>
					<th class="th-sm">Birthdate</th>
					<th class="th-sm">Course</th>
					<th class="th-sm">Year</th>
					<th class="th-sm">Join Date</th>
				</tr>
			</thead>
			<tbody >
				<tr align="center">
					<td><?= $fetch_detail['id']?></td>
					<td><?= $fetch_detail['fname']?></td>
					<td><?= $fetch_detail['lname']?></td>
					<td><?= $fetch_detail['gender']?></td>
					<td><?= $fetch_detail['b_date']?></td>
					<td><?= $fetch_detail['c_id']?></td>
					<td><?= $fetch_detail['year']?></td>
					<td><?= date_format(date_create($fetch_detail['j_date']),"d-m-Y");?></td>
				</tr>
			</tbody>
		</table>
		</div>
		</div>		
	</div>	
	</div>	


<div class="container">
	<div class="card p-4 mb-4">
		<div class="row">
		<div class="col" >
		<h4 class="card-title text-center">Submitted Assignment</h4>
			<table class="table  table-bordered table-sm  table-hover" align="center" cellpadding="9" border="1">
				<thead class="thead-light" align="center">
					<tr >
						<th></th>
						<th>Date Uploaded</th>
						<th>Filename</th>
						<th>Download</th>
					</tr>
				</thead>
				<tbody >
					<?php
						$select = "select * from storage where s_id='$id'";
						$query = mysqli_query($con, $select);
						$i =1; 
						while($fetch = mysqli_fetch_array($query)){
					?>
					<tr align="center">
						<td><?= $i++?></td>
						<td><?= date_format(date_create($fetch['date']),"d-m-Y g:i A");?></td>
						<td><?= $fetch['filename']?></td>			
						<td><a href="download.php?f_id=<?= $fetch['f_id']?>"  class="btn btn-sm btn-mdb-color" title="Click here to dowload assignment" ><i class="fas fa-download"></i></a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>
			</div>		
		</div>	
	</div>	
<?php include "script.php";?>

</body>
</html>