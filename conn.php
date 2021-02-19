<?php       //data base conection

	$con = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($con, "shub");

	echo ($db == 1)? "db connected" : "db not connected";

	if(!$con){
		die("Error: Failed to connect to database!");
	}

	$query = mysqli_query($con, "select * from admin") or die(mysqli_error());
	$default = mysqli_num_rows($query);
	//var_dump($default);

	if($default === 0){
		$pass = md5('admin');
		mysqli_query($con, "insert into admin values('','administrator','','admin','$pass','admin')");
		return false;
	}