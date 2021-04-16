<?php
	require "stu_session_validator.php";
	require_once 'conn.php';
?>
<h1>Add study material</h1>
<hr>
<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="file" size="4" required="required"> <br>
	<input type="text" name="title" placeholder="Enter title or topic name" required=""> <br>
	Course : 
	<select name="c_id" required="">
		<option value="">select course</option>
		<option value="B.Sc">B.Sc</option>
		<option value="B.Ca">B.Ca</option>
		<option value="B.Com">B.Com</option>
		<option value="B.E">B.E</option>
		<option value="B.Ba">B.Ba</option>
		<option value="B.A">B.A</option>
		<option value="M.Sc">M.Sc</option>
		<option value="M.Ca">M.Ca</option>
		<option value="M.Com">M.Com</option>
		<option value="M.E">M.E</option>
		<option value="M.Ba">M.Ba</option>
		<option value="M.A">M.A</option>
	</select><br>
	<button name="save">Add File</button>
</form>
<?php // save material by admin 
	

	if(isset($_POST['save'])){	
		
		$c_id = $_POST['c_id'];						  	// course id
		$title = $_POST['title'];						// title or topic name
		
		$name = $_FILES['file']['name'];      			// file name
		$type = $_FILES['file']['type'];      			// file type
		$temp = $_FILES['file']['tmp_name'];  			// temp file name
		$location = "material/".$c_id."/".$name; 		// directory for save file
		$date = date("Y-m-d H:i:s");					// time stamp

		if(!file_exists("material/".$c_id)){
			mkdir("material/".$c_id, 0777, true); //
		}


		if($type != "application/pdf"){
			
			//header('location:home.php');
			echo "<script>
						alert('Only Pdf file format is allowed.');
						window.location.href='add_study_material.php';
			</script>"; //change the page redirect later
		} else {

			if(file_exists($location)){
				echo "<script>
							alert('File already uploaded.');
							window.location.href='add_study_material.php';
				</script>";
				//change the page redirect later
				//header('location:student_profile.php');
			} else {

				if(move_uploaded_file($temp, $location)){
					$insert = "insert into material values('','$name','$type','$title','$c_id','$date')";
					mysqli_query($con, $insert);
					header('location:add_study_material.php'); //change the page redirect later
				}
			}

		}
		
	}
?>
<table align="center" cellpadding="9" border="1">
	<thead>
		<th>Date</th>
		<th>Course</th>
		<th>Title</th>
		<th>File Name</th>
		<th>Option</th>
	</thead>
	<tbody>
		<?php
			$query = mysqli_query($con, "select * from material");
			while ($fetch = mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?= $fetch['date']?></td>
			<td><?= $fetch['c_id']?></td>
			<td><?= $fetch['title']?></td>
			<td><?= $fetch['name']?></td>
			<td><button><a href="remove_study_material.php?id=<?= $fetch['id']?>" onclick="if(confirm('Are you sure you want to remove this study material ?')) return true; else return false;">Remove</a></button></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>