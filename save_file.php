<?php // save assigment submited by student
	require_once 'conn.php';

	if(isset($_POST['save'])){	
		
		$c_id = $_POST['c_id'];								// course id
		$s_id = $_POST['s_id'];								// stuent id
		$s_name = $_POST['s_name'];             			// student name
		$f_name = $_FILES['file']['name'];      			// file name
		$f_type = $_FILES['file']['type'];      			// file type
		$f_temp = $_FILES['file']['tmp_name'];  			// temp name of file
		$location = "files/".$s_id."_".$s_name."/".$f_name; // location where file will save
		$date = date("Y-m-d H:i:s");						// date of submited file

		if(!file_exists("files/".$s_id."_".$s_name)){
			mkdir("files/".$s_id."_".$s_name, 0777, true); // script for making nested directory
		}

		# check if file is pdf or not
		if($f_type != "application/pdf"){
			
			//header('location:student_profile.php');
			echo "<script>
						alert('Only Pdf file format is allowed.');
						window.location.href='student_profile.php';
			</script>";
		} else {
			# check if file already exists or not
			if(file_exists($location)){
				echo "<script>
							alert('File already uploaded.');
							window.location.href='student_profile.php';
				</script>";

				//header('location:student_profile.php');
			} else {
				# save file in folder and keep records in table
				if(move_uploaded_file($f_temp, $location)){
					$insert = "insert into storage values('','$f_name','$f_type','$date','$s_id','$s_name','$c_id')";
					mysqli_query($con, $insert);
					header('location:student_profile.php');
				}
			}

			

		}
		
	}
?>