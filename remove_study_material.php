<?php
	require_once 'conn.php';

	#remove studey material from directory
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];		// get sstudy material id
		$select = "select * from material where id='$id'";
		$query = mysqli_query($con, $select);
		$fetch = mysqli_fetch_array($query);

		$filename = $fetch['name'];		// fetch name of study material
		$c_id = $fetch['c_id'];			// fetch course id of studt material
		

		if(unlink("material/".$c_id."/".$filename)){
			$delete = mysqli_query($con, "delete from material where id='$id'");

			if($delete == 1){
				header('location:add_study_material.php');
			}
		}
	}
?>