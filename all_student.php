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

    <title>S-Hub | All Student List</title>
  </head>
  <body>

	<?php
	include_once "nav_admin.php";
	?>	
	
<!--button>Add Student</button-->

<div class="container">
	

<!--hr-->
<div class="row"><div class="col">
<div class="card p-4">
	
		<div class="btn-group mx-auto" role="group">
			  <a  type="button" class="btn btn-grey" href="add_student.php" >Your Students</a>
			  <a  type="button" class="btn btn-green" href="all_student.php">All students</a>
		</div>
		
<div id="table" class="table-responsive-sm">
	<h5 class="card-title text-center mt-4">List of all students</h5>
<!-- Display student data in table formate -->
<table id="stu_table" class="table table-striped table-bordered table-sm"  border="2px" >
	<thead class="thead-dark">
		<tr align="center">
			<th class="th-sm">Stu Id</th>
			<th class="th-sm">Firstame</th>
			<th class="th-sm">Lastname</th>
			<th class="th-sm">Gender</th>
			<th class="th-sm">Birthdate</th>
			<th class="th-sm">Course</th>
			<th class="th-sm">Year</th>
			<th class="th-sm">Teacher</th>
			<th class="th-sm">Action</th>
		</tr>
	</thead>
	<tbody id="table_body">
	<?php
		
		$user = $_SESSION['username'];
		$query = mysqli_query($con, "select * from student") or die(mysqli_error($con));
		
		//// while loop start ////
		while($fetch = mysqli_fetch_array($query)){
	?>
		<tr align="center">
			<td><?php echo $fetch['id'] ?></td>
			<td><?php echo $fetch['fname'] ?></td>
			<td><?php echo $fetch['lname'] ?></td>
			<td><?php echo $fetch['gender'] ?></td>
			<td><?php echo $fetch['b_date'] ?></td>
			<td><?php echo $fetch['c_id'] ?></td>
			<td><?php echo $fetch['year'] ?></td>
			<td><?php echo $fetch['teacher']?></td>
			<td><?php  
					if($_SESSION['status'] == 'admin'){
				?>
				<!-- button redirect to update student page -->
				<a href="update_student.php?id=<?= $fetch['id']?>&fname=<?= $fetch['fname']?>&lname=<?= $fetch['lname']?>&gender=<?= $fetch['gender']?>&b_date=<?= $fetch['b_date']?>&c_id=<?= $fetch['c_id']?>&year=<?= $fetch['year']?>"  onclick="if(confirm('Are you sure you want to update student data ?')) return true; else return false;" class="btn btn-sm btn-mdb-color"><i class="fas fa-pen-nib"></i></a>

				<!-- button links to delete student page after confermation -->
				<a href="delete_student.php?id=<?= $fetch['id'];?>" onclick="if(confirm('Are you sure you want to delete student data ?')) return true; else return false;" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
				<?php  } ?>
				<a href="view_stu_assignment.php?id=<?= $fetch['id']?>&fname=<?= $fetch['fname']?>" target="_blank" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i></a>
			</td>
		</tr>
	<?php  } /// while loop end ////  ?>
	</tbody>
</table>
</div>
</div>
</div></div>

<?php include "script.php";?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#stu_table').DataTable();
		$('.dataTables_length').addClass('bs-select');

		
	});

	
</script>
</body>
</html>