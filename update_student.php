<?php
	require_once 'conn.php';

	$getid = $_GET['id'];

	//echo $id;
?>
<h1>Update student details</h1><hr>

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
		<option value="bsc">B.Sc</option>
		<option value="bca">B.Ca</option>
		<option value="bcom">B.Com</option>
		<option value="be">B.E</option>
		<option value="bba">B.Ba</option>
		<option value="ba">B.A</option>
		<option value="msc">M.Sc</option>
		<option value="mca">M.Ca</option>
		<option value="mcom">M.Com</option>
		<option value="me">M.E</option>
		<option value="mba">M.Ba</option>
		<option value="ma">M.A</option>
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
<?php
	
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$bdate = $_POST['b_date'];
		$cid = $_POST['c_id'];
		$year = $_POST['year'];
		$pass = md5($_POST['lname']."".$_POST['id']);

		$update = "update student set id='$id', fname='$fname', lname='$lname', gender='$gender', b_date='$bdate', c_id='$cid', year='$year', pass='$pass' where id='$getid' ";
		$query = mysqli_query($con, $update) or die(mysqli_error($con));

		//echo ($query == 1)? "inserted" : "retry";
	}
?>