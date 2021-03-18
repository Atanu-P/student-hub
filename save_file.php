<?php // save file by student page
	require_once 'conn.php';

	if(isset($_POST['save'])){	
		
		$c_id = $_POST['c_id'];					// 
		$s_id = $_POST['s_id'];					//
		$s_name = $_POST['s_name'];             //
		$f_name = $_FILES['file']['name'];      //
		$f_type = $_FILES['file']['type'];      //
		$f_temp = $_FILES['file']['tmp_name'];  //
		$location = "files/".$s_id."_".$s_name."/".$f_name; //
		$date = date("Y-m-d H:i:s");//

		if(!file_exists("files/".$s_id."_".$s_name)){
			mkdir("files/".$s_id."_".$s_name, 0777, true); //
		}


		if($f_type != "application/pdf"){
			
			header('location:student_profile.php');
			echo "<script>
						alert('Only Pdf file format is allowed.');
						window.location.href='student_profile.php';
			</script>";
		} else {

			if(file_exists($location)){
				echo "<script>
							alert('File already uploaded.');
							window.location.href='student_profile.php';
				</script>";

				//header('location:student_profile.php');
			} else {

				if(move_uploaded_file($f_temp, $location)){
					$insert = "insert into storage values('','$f_name','$f_type','$date','$s_id','$s_name','$c_id')";
					mysqli_query($con, $insert);
					header('location:student_profile.php');
				}
			}

			

		}
		
	}
?>