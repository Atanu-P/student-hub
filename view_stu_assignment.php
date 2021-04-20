<?php
	require 'session_validator.php';
	require_once 'conn.php';

	$id = $_GET['id'];
	$fname = $_GET['fname'];

	$query = mysqli_query($con, "select * from student where id='$id'");
	$fetch_detail = mysqli_fetch_array($query);
?>
<h1><?= $fetch_detail['fname'].' '.$fetch_detail['lname']?></h1><hr>

<h2>Id : <?= $fetch_detail['id']?></h2>

<h2>Gender : <?= $fetch_detail['gender']?></h2>
<h2>Birthdate : <?= $fetch_detail['b_date']?></h2>
<h2>Course & Year : <?= $fetch_detail['c_id']." - ".$fetch_detail['year']?></h2>

<hr>

<table  align="center" cellpadding="9" border="1">
	<thead>
		<tr>
			<th>Date Uploaded</th>
			<th>Filname</th>
			<th>Other option</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$select = "select * from storage where s_id='$id' and s_name='$fname'";
			$query = mysqli_query($con, $select);
			while($fetch = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?= $fetch['date']?></td>
			<td><?= $fetch['filename']?></td>			
			<td><button><a href="download.php?f_id=<?= $fetch['f_id']?>">Download</a></button></td>
		</tr>
		<?php } ?>
	</tbody>
</table>