<?php // student login page
	session_start();
	require 'conn.php';

	if(isset($_POST['submit'])){
		$id = $_POST['id'];				//	student login id
		$pass = md5($_POST['pass']);	//	student login password

		$select = "select * from student where id='$id' && pass='$pass'";

		$query = mysqli_query($con, $select) or die(mysqli_error($con));
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);

		if($row > 0){
			// session variable set for student 
			$_SESSION['student'] = $fetch['id'];	// store student id in seesion variable
			$_SESSION['name'] = $fetch['fname'];	// store student firstname in seesion variable
			header('location:student_profile.php');
			//echo "<script>alert('Student logged in.');</script>";
		} else {
			echo "<script>alert('Invalid username or password.');
							window.location.href='index.php';
			</script>";
		}
	}
?>

