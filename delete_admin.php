<?php
	#delete admin 
	require_once 'conn.php';

	$id = $_GET['id'];

	$delete = "delete from admin where id='$id'";
	$query = mysqli_query($con, $delete);

	if($query == 1){
		header('location:add_admin.php');
	}
?>



