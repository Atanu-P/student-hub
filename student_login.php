<?php
	session_start();
	require 'conn.php';

	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$pass = md5($_POST['pass']);

		$select = "select * from student where id='$id' && pass='$pass'";

		$query = mysqli_query($con, $select) or die(mysqli_error($con));
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);

		if($row > 0){
			$_SESSION['student'] = $fetch['id'];
			echo "<script>alert('Student logged in.');</script>";
		} else {
			echo "<script>alert('Invalid username or password.');</script>";
		}
	}
?>
<h1>Student Log in</h1><hr>
<form method="post">
	Student Id : 
	<input type="number" name="id" placeholder="Enter Id" required>
	Password : 
	<input type="password" name="pass" placeholder="Enter Password" required>
	<button name="submit">Log In</button>
</form>