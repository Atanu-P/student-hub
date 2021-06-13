<?php
	require 'session_validator.php';
	require_once 'conn.php';

	if(isset($_POST['submit'])){
		$fname = ucfirst($_POST['fname']);		//	uppercase first of new firstname
		$lname = ucfirst($_POST['lname']);		//	uppercase first of new last name
		$user = strtolower($_POST['user']);		//  lower case of username of new admin

		$id = $_SESSION['admin'];							//  admin id from session variable
		$status = $_SESSION['status'];				//  admin role or status from session variable
		$olduser = $_POST['olduser'];					//  old username of admin

		//  update in admin table
		$update = "update admin set fname='$fname', lname='$lname', username='$user' where id='$id' and status='$status'";		
		//  update in study material table
		$update2 = "update material set upload_by='$user' where upload_by='$olduser'";
		//  update in student table
		$update3 = "update student set teacher='$user' where teacher='$olduser'";

		$query = mysqli_query($con, $update) or die(mysqli_error($con));
		$query2 = mysqli_query($con, $update2) or die(mysqli_error($con));
		$query3 = mysqli_query($con, $update3) or die(mysqli_error($con));
		if($query == 1 && $query2 == 1 && $query3 == 1){
			$_SESSION['username'] = $user;			// store new username in session variable
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

	<div class="container">		<!-- bootstrap container -->
		<div class="row justify-content-center">		<!-- bootstrap container row -->
			<div class="col-sm-6">
				<div class="card p-4 mb-4 mt-5">
					<h5 class="card-title text-center mb-5">Update Admin</h5>
						<form method="post">		<!-- bootstrap form for update admin information-->
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
							<input type="hidden" name="olduser" value="<?= $_SESSION['username']?>">
									<br>
									<button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>

							</form>		<!-- bootstrap form end -->
					</div>
				</div>
			</div>		<!-- bootstrap container row end -->
		</div>		<!-- bootstrap container end -->
<?php include "script.php";?>
</body>
</html>