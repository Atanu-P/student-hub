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

    <title>S-Hub | Student List</title>
  </head>
  <body>

	<?php
	include_once "nav_admin.php";
	?>	
	
<!--button>Add Student</button-->

<div class="container">
	<div class="card p-4 mb-4">
		<h5 class="card-title text-center">Add New Student</h5>
	<!-- Add student form -->
	<form action="" method="POST">
	<div class="form-row">
		<div class="form-group col-md-4">
			<label for="" class="sr-only">Student no :</label>
			<input type="number" name="id" class="form-control form-control-sm" placeholder="Stu Id" required="required">
		</div><br>
		<div class="form-group col-md-4">
			<label for="" class="sr-only">First Name :</label>
			<input type="text" name="fname" class="form-control form-control-sm" placeholder="First Name" required="">
		</div><br>
		<div class="form-group col-md-4">
			<label for="" class="sr-only">Last Name :</label>
			<input type="text" name="lname" class="form-control form-control-sm" placeholder="Last Name" required="">
		</div><br>
	</div>
	<div class="form-row">
		<div class="form-group col-md-3">
			<label for="" class="sr-only">Gender :</label>
			<select name="gender" class="form-control form-control-sm" required="">
				<option value="">Select Gender</option>
				<option value="m">Male</option>
				<option value="f">Female</option>
			</select>
		</div><br>
		<div class="form-group col-md-3">
			<label for="" class="sr-only">Birth-date : </label>
			<input type="date" name="b_date" class="form-control form-control-sm" required="">
		</div><br>
		<div class="form-group col-md-3">
			<label for="" class="sr-only">Course : </label>
			<select name="c_id" class="form-control form-control-sm" required="">
				<option value="">Select Course</option>
				<option value="B.Sc">B.Sc</option>
				<option value="B.Ca">B.Ca</option>
				<option value="B.Com">B.Com</option>
				<option value="B.E">B.E</option>
				<option value="B.Ba">B.Ba</option>
				<option value="B.A">B.A</option>
				<option value="M.Sc">M.Sc</option>
				<option value="M.Ca">M.Ca</option>
				<option value="M.Com">M.Com</option>
				<option value="M.E">M.E</option>
				<option value="M.Ba">M.Ba</option>
				<option value="M.A">M.A</option>
			</select>
		</div><br>
		<div class="form-group col-md-3">
			<label for="" class="sr-only">Year : </label>
			<select name="year" class="form-control form-control-sm" required="required">
				<option value="">Select Year</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
		</div>
		<!--Password :
		<input type="Password" name="pass" required=""><br>-->
	</div>
	
		<button type="submit" name="submit" class="btn btn-sm btn-info btn-block">Add Student</button>
	</form>
	</div>
<?php //insert student detail to db
	#require_once 'conn.php';

	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$fname = ucfirst($_POST['fname']);
		$lname = ucfirst($_POST['lname']);
		$gender = $_POST['gender'];
		$bdate = $_POST['b_date'];
		$cid = $_POST['c_id'];
		$year = $_POST['year'];
		$pass = md5(strtolower($_POST['lname'])."".$_POST['id']);
		$j_date = date("Y-m-d H:i:s");

		$insert = "INSERT INTO student VALUES('$id', '$fname', '$lname', '$gender', '$bdate', '$cid', '$year', '$pass' ,'$j_date')";
		$query = mysqli_query($con, $insert) or die(mysqli_error($con));

		//echo ($query == 1)? "inserted" : "retry";
	}

	//var_dump($insert);
?>
<!--hr-->
<div class="row"><div class="col">
<div class="card p-4">
	<h5 class="card-title text-center">List of Students</h5>
<div class="table-responsive-sm">
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
			<th class="th-sm">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
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
			<td>
				<!-- button redirect to update student page -->
				<a href="update_student.php?id=<?= $fetch['id']?>&fname=<?= $fetch['fname']?>&lname=<?= $fetch['lname']?>&gender=<?= $fetch['gender']?>&b_date=<?= $fetch['b_date']?>&c_id=<?= $fetch['c_id']?>&year=<?= $fetch['year']?>"  onclick="if(confirm('Are you sure you want to update student data ?')) return true; else return false;" class="btn btn-sm btn-mdb-color">Update</a>

				<!-- button links to delete student page after confermation -->
				<a href="delete_student.php?id=<?= $fetch['id'];?>" onclick="if(confirm('Are you sure you want to delete student data ?')) return true; else return false;" class="btn btn-sm btn-danger">Delete</a>
				
				<a href="view_stu_assignment.php?id=<?= $fetch['id']?>&fname=<?= $fetch['fname']?>" target="_blank" class="btn btn-sm btn-dark">View Assignment</a>
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

		$('#adminNavbar .navbar-nav a').on('click', function(){
			$('#adminNavbar .navbar-nav').find('li.active').removeClass('active');
			$(this).parent('li').addClass('active');
		});
	});
</script>
</body>
</html>