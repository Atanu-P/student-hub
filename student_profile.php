<?php  //student profile page.
	session_start();
	
	if(!isset($_SESSION['student'])){
		//header(); redirect to that page if not login
		echo "<script>
				alert('Your are not logged in.');
				window.location.href='student_login.php';
		</script>";
	}
	
	require_once "conn.php"; //db connection
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

    <title>S-Hub | Student Profile</title>
  </head>
  <body>

  	<?php include_once "nav_stu.php"; ?>

<?php
	$select = "select * from student where id='$_SESSION[student]'";
	$query = mysqli_query($con, $select);
	$fetch = mysqli_fetch_array($query);
?>

<div class="container mt-4">
	
		<div class="row">
		<div class="col-md-5" >
			<div class="card p-4 mb-4">
			<h3 class="text-center"><?= $fetch['fname']." ".$fetch['lname']?></h3><hr>
			<h5 class="text-center">Student Id : <?= $fetch['id']?></h5>
			
			<h5 class="text-center" >Gender : <?= $fetch['gender']?></h5>
			<h5 class="text-center">Birthdate : <?= $fetch['b_date']?></h5>
			<h5 class="text-center">Course & Year : <?= $fetch['c_id']." - ".$fetch['year']?>th</h5>

			<hr>
			<!-- form for adding file by student -->
			<form action="save_file.php" method="post" enctype="multipart/form-data">
				<div class="form-row mb-2">
					<div class="input-group input-group-sm col-sm">
						<div class="custom-file">
						<input type="file" name="file" class="custom-file-input" id="choosefile" required="required" accept="application/pdf">
						<label class="custom-file-label" for="choosefile">Choose file</label>
						</div>
					</div>
				</div>
				<input type="hidden" name="s_id" value="<?= $fetch['id']?>">
				<input type="hidden" name="s_name" value="<?= $fetch['fname'].' '.$fetch['lname']?>">
				<input type="hidden" name="c_id" value="<?= $fetch['c_id']?>">
				
					<button name="save" class="btn btn-sm btn-mdb-color btn-block">Upload Assignment</button>
				
			</form>
		</div>
		</div>

		<div class="col-md-7" >
			<div class="card p-4 mb-4">
				<h4 class="card-title text-center">Your Assignments</h4>
			<table  class="table table-striped table-bordered table-sm" border="1">
				<thead class="thead-dark">
					<tr align="center">
						<th></th>
						<th>Filname</th>
						<th>Date</th>
						<th>Other options</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$id = $fetch['id']; //fetching student id from student table
						$query = mysqli_query($con, "select * from storage where s_id='$id'");
						$i = 1;
						while($fetch = mysqli_fetch_array($query)){
					?>
					<tr ><!-- fetching data from storage table-->
						<td><?= $i++ ?></td>
						<td><?= $fetch['filename']?></td>
						<td align="center"><?= date_format(date_create($fetch['date']),"d-m-Y")?></td>
						<td align="center"><a href="download.php?f_id=<?= $fetch['f_id']?>" class="btn btn-sm btn-grey"><i class="fas fa-cloud-download-alt"></i></a> <a href="remove_file.php?f_id=<?= $fetch['f_id']?>" onclick="if(confirm('Are you sure you want to delete file ?')) return true; else return false;" class="btn btn-sm btn-danger"><i class="fas fa-trash"></a></td> <!-- dowload file link & Removefile link-->
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<?php include "script.php";?>

</body>
</html>