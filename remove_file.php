<?php
	require_once 'conn.php';

	# remove file from folder and delet records in table
	if(isset($_GET['f_id'])){
		$f_id = $_GET['f_id'];
		$select = "select * from storage where f_id='$f_id'";
		$query = mysqli_query($con, $select);
		$fetch = mysqli_fetch_array($query);

		$filename = $fetch['filename'];
		$s_id = $fetch['s_id'];
		$s_name = $fetch['s_name'];

		if(unlink("files/".$s_id."_".$s_name."/".$filename)){
			$delete = mysqli_query($con, "delete from storage where f_id='$f_id'");

			if($delete == 1){
				header('location:student_profile.php');
			}
		}
	}
?>