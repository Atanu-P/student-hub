<?php
	require 'session_validator.php';
	require_once 'conn.php';		

	$id = $_GET['id'];

	$query = mysqli_query($con, "select * from admin where id='$id'");
	$fetch = mysqli_fetch_array($query);
	$username = $fetch['fname']." ".$fetch['lname'];

	
	if(isset($_POST['submit'])){
		$role = $_POST['status'];

		$update = "update admin set status='$role' where id='$id'";
		$query = mysqli_query($con, $update) or die(mysqli_error($con));

		if($query == 1){
			header('location:add_admin.php');
		}
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
    

    <title>S-Hub | Change role</title>
  </head>
  <body>

  	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-6">
				<div class="card p-4 mb-4 mt-5">
					<h5 class="card-title text-center mb-5">Change Role of <?= $username?></h5>
					<form method="post">
						<div class="form-row">	
						<div class="form-group col">
							<label for="" class="sr-only">Select role</label>
							<select name="status" class="form-control"  required="">
								<option value="">Select Role for <?= $username?></option>
								<option value="admin">Admin</option>
								<option value="teacher">Teacher</option>
							</select>
						</div>
						</div>
						<button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php include "script.php";?>

</body>
</html>