<?php
	require 'session_validator.php';	
	require_once 'conn.php';

	// save material by admin 
	if(isset($_POST['save'])){	
		
		$c_id = $_POST['c_id'];						  				// course id
		$title = $_POST['title'];										// title or topic name
		$username = $_SESSION['username'];					// username in sessionvariable
		$name = $_FILES['file']['name'];      			// file name
		$type = $_FILES['file']['type'];      			// file type
		$temp = $_FILES['file']['tmp_name'];  			// temp file name
		$location = "material/".$c_id."/".$name; 		// directory for save file
		$date = date("Y-m-d H:i:s");								// time stamp

		if(!file_exists("material/".$c_id)){
			mkdir("material/".$c_id, 0777, true); 		// nested directory
		}


		if($type != "application/pdf"){  // check if file is pdf or not
			
			//header('location:home.php');
			echo "<script>
						alert('Only Pdf file format is allowed.');
						window.location.href='add_study_material.php';
			</script>"; //change the page redirect later
		} else {

			if(file_exists($location)){  //check if file already exists or not
				echo "<script>
							alert('File already uploaded.');
							window.location.href='add_study_material.php';
				</script>";
				//change the page redirect later
				//header('location:student_profile.php');
			} else {

				if(move_uploaded_file($temp, $location)){  // store file in directory and create entry in database
					$insert = "insert into material values('','$name','$type','$title','$c_id','$date' ,'$username')";
					mysqli_query($con, $insert);
					header('location:add_study_material.php'); 
				}
			}

		}
		
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include "stylesheet.php";?>
    <style type="text/css">
		table.dataTable thead .sorting:after,
		table.dataTable thead .sorting:before,
		table.dataTable thead .sorting_asc:after,
		table.dataTable thead .sorting_asc:before,
		table.dataTable thead .sorting_asc_disabled:after,
		table.dataTable thead .sorting_asc_disabled:before,
		table.dataTable thead .sorting_desc:after,
		table.dataTable thead .sorting_desc:before,
		table.dataTable thead .sorting_desc_disabled:after,
		table.dataTable thead .sorting_desc_disabled:before {
		bottom: .5em;
		}
    </style>

    <title>S-Hub | Study Material</title>
  </head>
  <body>
	
	<?php
		include_once "nav_admin.php";
	?>

<div class="container">  <!-- bootstrap container start -->
	<div class="card p-4 mb-4">
		<h5 class="card-title text-center">Add study material</h5>
		<form action="" method="post" enctype="multipart/form-data">  <!-- bootstrap form start -->
			<div class="form-row">		<!-- bootstrap form row -->
				<div class="input-group input-group-sm col-md-4">
					
  						<div class="custom-file">
    					<input type="file" name="file" class="custom-file-input" id="choosefile" required>
    					<label class="custom-file-label" for="choosefile">Choose file</label>
  						</div>
  						
					<!--div class="">
					<label for="" class="sr-only">Upload File :</label>
					<input type="file" name="file"  class="form-control form-control-sm " required="required">
					</div-->
				</div>
				<div class="form-group col-md-4">
					<label for="" class="sr-only">Enter title name :</label>
					<input type="text" name="title" placeholder="Enter title or topic name" class="form-control " required=""> 
				</div>
				<div class="form-group col-auto">
					<label for="" class="sr-only">Select course :</label>
					<select name="c_id" class="form-control form-control-sm" required="">
						<option value="">Select Course</option>
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
					</select>
					</div>
					<div class="form-group col-auto">
						<button name="save" class="btn btn-sm btn-mdb-color btn-block">Add File</button>
					</div>
				</div>
			</div>  <!-- bootstrap form row end-->
		</form>  <!-- bootstrap form end -->
</div>
</div>

<div class="container">		<!-- bootstrap container start -->
	<div class="card p-4 mb-4">
		<div class="row">		<!-- bootstrap container row -->
		<div class="col" >
		<h4 class="card-title text-center">Study Materials List</h4>
<table id="material" class="table table-striped table-bordered table-sm" border="1">		<!-- bootstrap table start -->
	<thead class="thead-dark" >
		<tr align="center">
			<th class="th-sm">Date</th>
			<th class="th-sm">Course</th>
			<th class="th-sm">Title</th>
			<th class="th-sm">File Name</th>
			<th class="th-sm">Uploaded by</th>
			<th class="th-sm">Options</th>
		</tr>
	</thead>
	<tbody>
		<?php
			
			$query = mysqli_query($con, "select * from material");
			while ($fetch = mysqli_fetch_array($query)) {  /// while loop start ///
		?>
		<tr align="center">
			<td><?= date_format(date_create($fetch['date']),"d-m-Y g:i A");?></td>
			<td><?= $fetch['c_id']?></td>
			<td><?= $fetch['title']?></td>
			<td><?= $fetch['name']?></td>
			<td><?= $fetch['upload_by']?></td>
			<td><a href="download_study_material.php?id=<?= $fetch['id']?>" class="btn btn-sm btn-blue" title="Click here to download study material"><i class="fas fa-cloud-download-alt"></i></a>
				<?php if($_SESSION['status'] == 'admin'){?>
					<a href="remove_study_material.php?id=<?= $fetch['id']?>" onclick="if(confirm('Are you sure you want to remove this study material ?')) return true; else return false;" class="btn btn-sm btn-danger" title="Delete Study-material"><i class="far fa-trash-alt"></i></a>
				<?php }else{ if($_SESSION['username'] == $fetch['upload_by']){?><a href="remove_study_material.php?id=<?= $fetch['id']?>" onclick="if(confirm('Are you sure you want to remove this study material ?')) return true; else return false;" class="btn btn-sm btn-danger" title="Delete Study-material"><i class="far fa-trash-alt"></i></a><?php } }?></td><!-- delete button-->
		</tr>
		<?php
			}  /// while loop end ////
		?>
	</tbody>
</table>		<!-- bootstrap table end -->
</div>
</div>
</div>
</div>

<?php include "script.php";?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#material').DataTable();
		$('.dataTables_length').addClass('bs-select');

		
	});
</script>

</body>
</html>