<?php // student login page
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
			// session variable set for student 
			$_SESSION['student'] = $fetch['id'];
			$_SESSION['name'] = $fetch['fname'];
			header('location:student_profile.php');
			//echo "<script>alert('Student logged in.');</script>";
		} else {
			echo "<script>alert('Invalid username or password.');</script>";
		}
	}
?>

