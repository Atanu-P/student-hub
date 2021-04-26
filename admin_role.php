<?php
	require 'session_validator.php';
	require_once 'conn.php';		
?>
<h1>Change role</h1><hr>

<form method="post">
	<select name="status" required="">
		<option value="">select</option>
		<option value="admin">Admin</option>
		<option value="teacher">Teacher</option>
	</select><br>
	<input type="submit" name="submit">
</form>

<?php
	
	$id = $_GET['id'];
	if(isset($_POST['submit'])){
		$role = $_POST['status'];

		$update = "update admin set status='$role' where id='$id'";
		$query = mysqli_query($con, $update) or die(mysqli_error($con));

		if($query == 1){
			header('location:add_admin.php');
		}
	}
?>