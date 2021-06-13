<?php
	require 'session_validator.php';
	require_once 'conn.php';


	if(isset($_POST['submit'])){
		$fname = ucfirst($_POST['fname']);
		$lname = ucfirst($_POST['lname']);
		$user = strtolower($_POST['fname'].$_POST['lname']);
		$pass = md5($_POST['status']);
		$role = $_POST['status'];

		$query = mysqli_query($con, "insert into admin values('','$fname','$lname','$user','$pass','$role')") or die(mysqli_error($con));

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

    <title>S-Hub | Add Admin or Teacher</title>
  </head>
  <body>
	
	<?php
		include_once "nav_admin.php";
	?>

<div class="container"> <!-- bootstrap container -->
	<div class="card p-4 mb-4">
		<h5 class="card-title text-center">Add Admin or Teacher</h5>
			<form method="post"> <!-- bootstrap form -->
			<div class="form-row">
			<div class="form-group col-sm-4">	
				<label for="" class="sr-only">First Name :</label>
				<input type="text" name="fname" placeholder="First Name" class="form-control " required="">
			</div>
			<div class="form-group col-sm-4">
				<label for="" class="sr-only">Last name :</label>
				<input type="text" name="lname" placeholder="Last Name" class="form-control " required="">
			</div>
			<div class="form-group col-sm-2">
				<label for="" class="sr-only">Role :</label>
				<select name="status" class="form-control" required="">
					<option value="">Select Role</option>
					<option value="admin">Admin</option>
					<option value="teacher">Teacher</option>
				</select>
			</div>
			<div class="form-group col-auto">
				<button type="submit" name="submit" class="btn btn-sm btn-mdb-color ">Add</button>
			</div>
			</div>	
			</form>  <!-- bootstrap form end-->
		</div>	
	</div> <!-- bootstrap container end-->



<div class="container"> <!-- bootstrap container -->
	<div class="card p-4 mb-4">
		<div class="row justify-content-center">
		<div class="col-sm-10 ">
			<h5 class="card-title text-center">List of Admin / Teacher</h5>
			<table class="table table-striped table-bordered table-sm" > <!-- bootstrap table -->
				<thead class="thead-dark">
					<tr align="center">
						<th>Name</th>
						<th>Role</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$username = $_SESSION['username'];
					$query = mysqli_query($con, "select * from admin where not username='$username'") or die(mysqli_error($con));
					while ($fetch = mysqli_fetch_array($query)) {  /// while loop start ////
				?>
					<tr align="center">
						<td><?= $fetch['fname']." ".$fetch['lname'] ?></td>
						<td><?= $fetch['status'] ?></td>
						<td><a href="admin_role.php?id=<?= $fetch['id']?>" onclick="if(confirm('Are you sure you want to change the role ?')) return true; else return false;" class="btn btn-sm btn-blue">Change role</a>  <a href="delete_admin.php?id=<?= $fetch['id']?>" onclick="if(confirm('Are you sure you want to delete ?')) return true; else return false;" class="btn btn-sm btn-danger">Remove</a></td> <!-- change role & delete button -->
					</tr>
				<?php }  /// while loop end ////  ?>
				</tbody>
			</table>  <!-- bootstrap table end -->
		</div>
		</div>
	</div>
</div>  <!-- bootstrap container end-->
<?php include "script.php";?>

</body>
</html>