<?php
	require 'conn.php';
	# view study material in table formate
?>

<h1>View Study Material</h1><hr>

<table align="center"  border="1" cellpadding="9" >
	<thead><tr>
		<th>Date</th>
		<th>Title</th>
		<th>Course</th>
		<th>Download</th>	
	</tr></thead>
	<tbody>
		<?php
			$select = "select * from material";
			$query = mysqli_query($con, $select);
			while($fetch = mysqli_fetch_array($query)){
		?>
		<tr>
			<td><?= $fetch['date']?></td>
			<td><?= $fetch['title']?></td>
			<td><?= $fetch['c_id']?></td>
			<td><button><a href="download_study_material.php?id=<?= $fetch['id']?>">Download</a></button></td>		
		</tr>
		<?php
			}
		?>
	</tbody>
</table>

