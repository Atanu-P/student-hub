<?php
	session_start();
	//require 'session_validator.php';
	require_once 'conn.php';


	if(isset($_POST['submit'])){
		$oldpass = md5($_POST['oldpass']);
		$newpass = md5($_POST['newpass']);
		$conpass = md5($_POST['conpass']);

		$id = $_SESSION['admin'];
		$status = $_SESSION['status'];

		$select = "select * from admin where id='$id' and status='$status'";
		$query = mysqli_query($con, $select);
		$fetch = mysqli_fetch_array($query);

		if($oldpass == $fetch['pass']    ){
			//echo "success";
			if($newpass == $conpass){
				$update = "update admin set pass='$newpass' where id='$id' and status='$status'";
			$query2 = mysqli_query($con, $update);

				if($query2 == 1){
					echo "<script>
								alert('Password successfully changed.');
								window.location.href='home.php';
						</script>";
				}
			} else {
				echo "<script>alert('New Password do not match.');</script>";
			}
			

		} else {
			echo "<script>alert('Invalid old password.');</script>";
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
    

    <title>S-Hub | Change Password</title>
  </head>
  <body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-6">
				<div class="card p-4 mb-4 mt-5">
					<h5 class="card-title text-center mb-5">Change Password</h5>
		
					<form method="post">
					<div class="form-row">	
						<div class="form-group col">	
							<label for="" class="sr-only">Old-password :</label>
							<input type="password" name="oldpass" placeholder="Old Password" class="form-control" required>
						</div>
					</div>
					<div class="form-row">	
						<div class="form-group col">
							<label for="" class="sr-only">New-password :</label> 
							<input type="password" name="newpass" placeholder="New Password" class="form-control" required>
						</div>
					</div>
					<div class="form-row">	
						<div class="form-group col">	
							<label for="" class="sr-only">Confirm-password :</label>
							<input type="password" name="conpass" placeholder="Confirm Password" class="form-control" required>
						</div>
					</div>	
						
					<button type="submit" name="submit" class="btn btn-primary btn-block">Update password</button>
						
					
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include "script.php";?>

</body>
</html>