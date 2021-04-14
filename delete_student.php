<?php
	require_once 'conn.php';

	# delet student from table
	$getid = $_GET['id'];

	echo $id;

	$delete = "delete from student where id='$getid'";

	$query = mysqli_query($con, $delete);

	if($query == 1){
		
		header('location:student.php');
	}
?>