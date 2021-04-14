<?php
	require_once 'conn.php';

	# download study material

	if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];

		$select = "select * from material where id='$id'";
		$query = mysqli_query($con, $select) or die(mysqli_error($con));
		$fetch = mysqli_fetch_array($query);
		$name = $fetch['name'];
		$c_id = $fetch['c_id'];

		# script for downloading pdf file
		header("Content-Disposition: attachment; filename=".$name);
		header("Content-Type: application/octet-stream;");
		flush();
		readfile("material/".$c_id."/".$name);

	}

?>