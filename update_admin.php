<?php
	require 'session_validator.php';
	require_once 'conn.php';
?>
<h1>Update detail</h1><hr>
<form method="post">
	First Name :
	<input type="text" name="fname" required>
	Last name :
	<input type="text" name="lname" required>
	User-name :
	<input type="text" name="user" required>
	<br>
	<input type="submit" name="submit">
</form>
<?php
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