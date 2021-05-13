<?php
	require 'conn.php';

	if(isset($_POST['submit'])){
		$fname = ucfirst($_POST['fname']);
		$lname = ucfirst($_POST['lname']);
		$user = strtolower($_POST['user']);
		$pass = md5($_POST['pass']);
		$role = 'admin';
		$query = mysqli_query($con, "insert into admin values('','$fname','$lname','$user','$pass','admin')") or die(mysqli_error($con));

		if($query == 1){
			echo "<script>alert('You are successfully registered as an admin.');
						window.location.href='index.php';
				</script>";
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
    <?php include_once "stylesheet.php";?>

    <title>S-HUB | Sign-Up</title>
  </head>
  <body>
  	<div class="container">
  		<div class="row justify-content-center">
			<div class="col-sm-6">
				<div class="card p-4 mb-4 mt-5">
					<h1 class="h1-responsive" align="center">Student-HUB</h1>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-sm-6">
				<div class="card p-4 mb-4 mt-5">
					<h5 class="card-title text-center mb-5">Admin Sign-Up</h5>
						
					<form method="post">
					<div class="form-row">	
						<div class="form-group col">	
							<label for="" class="sr-only">First Name :</label>
							<input type="text" name="fname" placeholder="First Name" class="form-control" required>
						</div>
					</div>
					<div class="form-row">	
						<div class="form-group col">
							<label for="" class="sr-only">Last Name :</label> 
							<input type="text" name="lname" placeholder="Last Name" class="form-control" required>
						</div>
					</div>
					<div class="form-row">	
						<div class="form-group col">	
							<label for="" class="sr-only">User Name :</label>
							<input type="text" name="user" placeholder="User Name" class="form-control" required>
						</div>
					</div>
					<div class="form-row">	
						<div class="form-group col">	
							<label for="" class="sr-only">Password :</label>
							<input type="password" name="pass" placeholder="Password" class="form-control" required>
						</div>
					</div>

						
					<button type="submit" name="submit" class="btn btn-primary btn-block">Sign-Up</button>
						
					
					</form>
				</div>
			</div>
		</div>
	</div>

  <?php include_once "script.php";?>
</body>
</html>