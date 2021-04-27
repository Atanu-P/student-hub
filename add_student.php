<?php
	require 'session_validator.php';
	require_once 'conn.php';
?>


<h1>Add student page</h1><hr>
<!--button>Add Student</button-->

<!-- Add student form -->
<form action="" method="POST">
	Student no :
	<input type="number" name="id" required="required"><br>
	First Name :
	<input type="text" name="fname" required=""><br>
	Last Name :
	<input type="text" name="lname" required=""><br>
	Gender :
	<select name="gender" required="">
		<option value="">select</option>
		<option value="m">Male</option>
		<option value="f">Female</option>
	</select><br>
	Birthdate : 
	<input type="date" name="b_date" required=""><br>
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
	Year : 
	<select name="year" required="required">
		<option value="">select year</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select><br>
	<!--Password :
	<input type="Password" name="pass" required=""><br>-->
	<input type="submit" name="submit" value="Submit">
</form>

<?php //insert student detail to db
	#require_once 'conn.php';

	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$fname = ucfirst($_POST['fname']);
		$lname = ucfirst($_POST['lname']);
		$gender = $_POST['gender'];
		$bdate = $_POST['b_date'];
		$cid = $_POST['c_id'];
		$year = $_POST['year'];
		$pass = md5(strtolower($_POST['lname'])."".$_POST['id']);
		$j_date = date("Y-m-d H:i:s");

		$insert = "INSERT INTO student VALUES('$id', '$fname', '$lname', '$gender', '$bdate', '$cid', '$year', '$pass' ,'$j_date')";
		$query = mysqli_query($con, $insert) or die(mysqli_error($con));

		//echo ($query == 1)? "inserted" : "retry";
	}

	//var_dump($insert);
?>
<hr>


<!-- Display student data in table formate -->
<table align="center" border="2px" cellpadding="10px">
	<thead>
		<tr>
			<th>Stu Id</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Gender</th>
			<th>Birthdate</th>
			<th>Course</th>
			<th>Year</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$query = mysqli_query($con, "select * from student") or die(mysqli_error($con));
		//// while loop start ////
		while($fetch = mysqli_fetch_array($query)){
	?>
		<tr>
			<td><?php echo $fetch['id'] ?></td>
			<td><?php echo $fetch['fname'] ?></td>
			<td><?php echo $fetch['lname'] ?></td>
			<td><?php echo $fetch['gender'] ?></td>
			<td><?php echo $fetch['b_date'] ?></td>
			<td><?php echo $fetch['c_id'] ?></td>
			<td><?php echo $fetch['year'] ?></td>
			<td>
				<!-- button redirect to update student page -->
				<button><a href="update_student.php?id=<?= $fetch['id']?>&fname=<?= $fetch['fname']?>&lname=<?= $fetch['lname']?>&gender=<?= $fetch['gender']?>&b_date=<?= $fetch['b_date']?>&c_id=<?= $fetch['c_id']?>&year=<?= $fetch['year']?>"  onclick="S">Update</a></button>

				<!-- button links to delete student page after confermation -->
				<button ><a href="delete_student.php?id=<?= $fetch['id'];?>" onclick="if(confirm('Are you sure you want to delete student data ?')) return true; else return false;" >Delete</a></button>
				
				<button><a href="view_stu_assignment.php?id=<?= $fetch['id']?>&fname=<?= $fetch['fname']?>" target="_blank" >View Assignment</a></button>
			</td>
		</tr>
	<?php  } /// while loop end ////  ?>
	</tbody>
</table>