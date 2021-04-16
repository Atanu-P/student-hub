<?php  //student profile page.
	require "stu_session_validator.php";
	require_once "conn.php"; //db connection
?>
<h1>Student profile page</h1>
<button><a href="student_logout.php" onclick="if(confirm('Are you sure you want to logout ?')) return true; else return false;">Logout</a></button>
<!-- link to student logout page after conformation -->
<hr>

<?php
	$select = "select * from student where id='$_SESSION[student]'";
	$query = mysqli_query($con, $select);
	$fetch = mysqli_fetch_array($query);
?>
<h2>Id : <?= $fetch['id']?></h2>
<h2>Name : <?= $fetch['fname']."-".$fetch['lname']?></h2>
<h2>Gender : <?= $fetch['gender']?></h2>
<h2>Birthdate : <?= $fetch['b_date']?></h2>
<h2>Course & Year : <?= $fetch['c_id']." - ".$fetch['year']?></h2>

<hr>
<!-- form for adding file by student -->
<form action="save_file.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file" size="4" required="required">
	<input type="hidden" name="s_id" value="<?= $fetch['id']?>">
	<input type="hidden" name="s_name" value="<?= $fetch['fname']?>">
	<input type="hidden" name="c_id" value="<?= $fetch['c_id']?>">
	<button name="save">Add File</button>
</form>

<hr>
<table align="center" cellpadding="9" border="1">
	<thead>
		<tr>
			<th>Filname</th>
			<th>File Type</th>
			<th>Date Uploaded</th>
			<th>Other option</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$id = $fetch['id']; //fetching student id from student table
			$query = mysqli_query($con, "select * from storage where s_id='$id'");
			while($fetch = mysqli_fetch_array($query)){
		?>
		<tr><!-- fetching data from storage table-->
			<td><?= $fetch['filename']?></td>
			<td><?= $fetch['type']?></td>
			<td><?= $fetch['date']?></td>
			<td><button><a href="download.php?f_id=<?= $fetch['f_id']?>">Download</a></button> | <button><a href="remove_file.php?f_id=<?= $fetch['f_id']?>" onclick="if(confirm('Are you sure you want to delete file ?')) return true; else return false;">Delete</a></button></td> <!-- dowload file link & Removefile link-->
		</tr>
		<?php
			}
		?>
	</tbody>
</table>