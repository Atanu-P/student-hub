<?php
	require 'conn.php';

	


?>
<h1>View assignment</h1><hr>

<table align="center"  border="1" cellpadding="9" >
	<thead>
		<tr>
			<th>Date</th>
			<th>Filename</th>
			<th>Student Id</th>
			<th>Student name</th>
			<th>Course Name</th>
			<th>Download</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$select = "select * from storage";
			$query = mysqli_query($con, $select);
			while ($fetch = mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?= $fetch['date']?></td>
			<td><?= $fetch['filename']?></td>
			<td><?= $fetch['s_id']?></td>
			<td><?= $fetch['s_name']?></td>
			<td><?= $fetch['c_id']?></td>
			<td> <button><a href="download.php?f_id=<?= $fetch['f_id']?>">Download</a></button> </td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>