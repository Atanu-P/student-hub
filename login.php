<?php
	session_start();
	require 'conn.php';

	if(isset($_POST['submit'])){
		$user = $_POST['username'];
		$pass = md5($_POST['pass']);

		$query = mysqli_query($con, "select * from admin where username = '$user' and pass ='$pass'") or die(mysqli_error());
		$array = mysqli_fetch_array($query);
		$row = $query->num_rows; //number of rows in table

		//var_dump($query);
		//var_dump($row);

		if($row > 0){

			//session variable
			$_SESSION['admin'] = $array['id'];
			$_SESSION['status'] = $array['status'];
			$_SESSION['username'] = $array['username'];
			header("location:home.php");
			echo "<script> alert('Loged in');</script>";
		} else {
			echo "<script> alert('Invalid username or password');</script>";
;		}
	}

?>

