<?php
	require_once 'conn.php';

	# update student details
	$getid = $_GET['id'];

	//echo $id;
?>
<h1>Update student details</h1><hr>
<h1>Current details</h1>
<h2>Id : <?= $_GET['id']?></h2>
<h2>Name : <?= $_GET['fname']."-".$_GET['lname']?></h2>
<h2>Gender : <?= $_GET['gender']?></h2>
<h2>Birthdate : <?= $_GET['b_date']?></h2>
<h2>Course & Year : <?= $_GET['c_id']." - ".$_GET['year']?></h2>
<hr>

<form action="" method="POST">
	Student no :
	<input type="number" name="id" value="<?= $_GET['id'];?>" required="required"><br>
	First Name :
	<input type="text" name="fname" value="<?= $_GET['fname'];?>" required=""><br>
	Last Name :
	<input type="text" name="lname" value="<?= $_GET['lname'];?>" required=""><br>
	Gender :
	<select name="gender" required="">
		<option value="">select</option>
		<option value="m">Male</option>
		<option value="f">Female</option>
	</select><br>
	Birthdate : 
	<input type="date" name="b_date" value="<?= $_GET['b_date'];?>" required=""><br>
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
	<input type="submit" name="submit" value="Submit" onclick="if(confirm('Do you want to save this student data ?')) return true; else return false;">
</form>
<?php
	
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$fname = ucfirst($_POST['fname']);
		$lname = ucfirst($_POST['lname']);
		$gender = $_POST['gender'];
		$bdate = $_POST['b_date'];
		$cid = $_POST['c_id'];
		$year = $_POST['year'];
		$pass = md5(strtolower($_POST['lname'])."".$_POST['id']);

		$update = "update student set id='$id', fname='$fname', lname='$lname', gender='$gender', b_date='$bdate', c_id='$cid', year='$year', pass='$pass' where id='$getid' ";
		$query = mysqli_query($con, $update) or die(mysqli_error($con));

		if($query == 1){
			header('location:add_student.php');
		}
		//echo ($query == 1)? "inserted" : "retry";
	}
?>