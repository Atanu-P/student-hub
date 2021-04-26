<?php
	require 'session_validator.php';
	require_once 'conn.php';
?>
<h1>Add Admin or Teacher</h1><hr>
<form method="post">
	First Name :
	<input type="text" name="fname">
	Last name :
	<input type="text" name="lname">
	Role :
	<select name="status" required="">
		<option value="">select</option>
		<option value="admin">Admin</option>
		<option value="teacher">Teacher</option>
	</select><br>
	<input type="submit" name="submit">
</form>

<?php
	if(isset($_POST['submit'])){
		$fname = ucfirst($_POST['fname']);
		$lname = ucfirst($_POST['lname']);
		$user = strtolower($_POST['fname'].$_POST['lname']);
		$pass = md5('teacher');
		$role = $_POST['status'];

		$query = mysqli_query($con, "insert into admin values('','$fname','$lname','$user','$pass','$role')") or die(mysqli_error($con));

		echo ($query == 1)? "inserted" : "retry";
	}
?>

<h1>List of Admin / Teacher</h1><hr>
<table align="center" border="2px" cellpadding="10px">
	<thead>
		<tr>
			<th>Name</th>
			<th>Role</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$query = mysqli_query($con, "select * from admin where id>1") or die(mysqli_error($con));
		while ($fetch = mysqli_fetch_array($query)) {
	?>
		<tr>
			<td><?= $fetch['fname']." ".$fetch['lname'] ?></td>
			<td><?= $fetch['status'] ?></td>
			<td><button><a href="admin_role.php?id=<?= $fetch['id']?>" onclick="if(confirm('Are you sure you want to change the role ?')) return true; else return false;">Change role</a></button> | <button><a href="delete_admin.php?id=<?= $fetch['id']?>" onclick="if(confirm('Are you sure you want to delete ?')) return true; else return false;">Delete</a></button></td>
		</tr>
	<?php } ?>
	</tbody>
</table>