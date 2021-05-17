<?php
	require 'session_validator.php';
	require_once 'conn.php';

	# update student details
	$getid = $_GET['id'];

	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$fname = ucfirst($_POST['fname']);
		$lname = ucfirst($_POST['lname']);
		$gender = $_POST['gender'];
		$bdate = $_POST['b_date'];
		$cid = $_POST['c_id'];
		$year = $_POST['year'];
		$pass = md5(strtolower($_POST['lname'])."".$_POST['id']);
		$teacher = $_POST['teacher'];

		$oldid=  $_GET['id'];
		$s_name =  $fname." ".$lname;
		
		$update = "update student set id='$id', fname='$fname', lname='$lname', gender='$gender', b_date='$bdate', c_id='$cid', year='$year', pass='$pass', teacher='$teacher' where id='$getid' ";
		
		$update2 = "update storage set s_id='$id', s_name='$s_name', c_id='$cid' where s_id='$oldid'";
		
		$query = mysqli_query($con, $update) or die(mysqli_error($con));
		$query2 = mysqli_query($con, $update2) or die(mysqli_error($con));
		if($query == 1){
			header('location:add_student.php');
			#echo   "<script>
			#			window.location.href='add_student.php';
			#		</script>";

		}
		//echo ($query == 1)? "inserted" : "retry";
	}
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

    <title>S-Hub | Update Student details</title>
  </head>
  <body>

	<?php
	include_once "nav_admin.php";
	?>	
	<div class="container">
	<div class="card p-4 mb-4 mt-2">
	<div class="row">
	<div class="col" align="center">
		
		<h4 class="card-title">Student details</h1>
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
				</tr>
			</thead>
			<tbody >
				<tr align="center">
					<td><?= $_GET['id']?></td>
					<td><?= $_GET['fname']?></td>
					<td><?= $_GET['lname']?></td>
					<td><?= $_GET['gender']?></td>
					<td><?= $_GET['b_date']?></td>
					<td><?= $_GET['c_id']?></td>
					<td><?= $_GET['year']?></td>
				</tr>
			</tbody>
		</table>
		<hr>
	</div></div></div></div>

	<div class="container">
	<div class="card p-4 mb-4">
		<h5 class="card-title text-center">Update Student details</h5>
	<!-- Add student form -->
	<form action="" method="POST">
	<div class="form-row">
		<div class="form-group col-md-4">
			<label for="" class="sr-only">Student no :</label>
			<input type="number" name="id" class="form-control form-control-sm" placeholder="Stu Id" value="<?= $_GET['id'];?>" required="required">
		</div><br>
		<div class="form-group col-md-4">
			<label for="" class="sr-only">First Name :</label>
			<input type="text" name="fname" class="form-control form-control-sm" placeholder="First Name" value="<?= $_GET['fname'];?>" required="">
		</div><br>
		<div class="form-group col-md-4">
			<label for="" class="sr-only">Last Name :</label>
			<input type="text" name="lname" class="form-control form-control-sm" placeholder="Last Name" value="<?= $_GET['lname'];?>" required="">
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
			<input type="date" name="b_date" class="form-control form-control-sm" value="<?= $_GET['b_date'];?>" required="">
		</div><br>
		<div class="form-group col-md-2">
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
		<div class="form-group col-md-2">
			<label for="" class="sr-only">Year : </label>
			<select name="year" class="form-control form-control-sm" required="required">
				<option value="">Select Year</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
		</div>
		<div class="form-group col-md-2">
			<label for="" class="sr-only">Change Teacher : </label>
			<select name="teacher" class="form-control form-control-sm" required="required">
				<option value="">Select Teacher</option>
				<?php 
					$select = mysqli_query($con, "select  username from admin");

					while ($arr = mysqli_fetch_array($select)) {
				?>
				<option value="<?= $arr['username']; ?>"><?= ucfirst($arr['username']); ?></option>
				<?php  } ?>
			</select>
		</div>
		<!--Password :
		<input type="Password" name="pass" required=""><br>-->
	</div>
	
		<button type="submit" name="submit" class="btn btn-sm btn-mdb-color btn-block" onclick="if(confirm('Do you want to save this student data ?')) return true; else return false;">Update Student</button>
	</form>
	</div>


<?php include "script.php";?>

</body>
</html>
