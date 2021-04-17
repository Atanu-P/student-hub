<?php
	session_start();
	//require 'session_validator.php';
	require_once 'conn.php';
?>
<form method="post">
	old-password :
	<input type="password" name="oldpass" required>
	new-password : 
	<input type="password" name="newpass" required>
	confirm-password : 
	<input type="password" name="conpass" required>
	<input type="submit" name="submit" value="Update password">
</form>

<?php
	
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