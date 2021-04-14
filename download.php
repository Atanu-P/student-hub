<?php // download assignment submited by student
	require_once 'conn.php';

	if(isset($_REQUEST['f_id'])){
		$f_id = $_REQUEST['f_id'];

		$select = "select * from storage where f_id='$f_id'";
		$query = mysqli_query($con, $select) or die(mysqli_error($con));
		$fetch = mysqli_fetch_array($query);
		$filename = $fetch['filename'];
		$s_id = $fetch['s_id'];
		$s_name = $fetch['s_name'];
		// image file not opening after download
		#script for downloading pdf file from server
		header("Content-Disposition: attachment; filename=".$filename);
		header("Content-Type: application/octet-stream;");
		flush();
		readfile("files/".$s_id."_".$s_name."/".$filename);
	}
?>