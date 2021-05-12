<?php
	require 'session_validator.php';
	require_once 'conn.php';

	if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];

		$id = $_SESSION['admin'];
		$status = $_SESSION['status'];

		$update = "update admin set fname='$fname', lname='$lname', username='$user' where id='$id' and status='$status'";
		$query = mysqli_query($con, $update) or die(mysqli_error($con));
		if($query == 1){
			header('location:home.php');
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
    
    <title>S-Hub | Update Admin</title>
  </head>
  <body>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-6">
				<div class="card p-4 mb-4 mt-5">
					<h5 class="card-title text-center mb-5">Update Admin</h5>
						<form method="post">
							<div class="form-row">	
								<div class="form-group col">
									<label for="" class="sr-only">First Name :</label>
									<input type="text" name="fname" placeholder="First Name" class="form-control" required>
								</div>
							</div>
							<div class="form-row">	
								<div class="form-group col">
									<label for="" class="sr-only">Last name :</label>
									<input type="text" name="lname" placeholder="Last Name" class="form-control" required>
								</div>
							</div>
							<div class="form-row">	
								<div class="form-group col">
									<label for="" class="sr-only">User-name :</label>
									<input type="text" name="user" placeholder="User-name" class="form-control" required>
								</div>
							</div>
									<br>
									<button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>

							</form>
					</div>
				</div>
			</div>
		</div>
<?php include "script.php";?>
</body>
</html>