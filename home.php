<?php
	require 'session_validator.php';
	require_once 'conn.php';
?>

<h1>Home page</h1>
<hr>
<form action="add_study_material.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file" size="4" required="required"> <br>
	<input type="text" name="title" placeholder="Enter title or topic name for material" required=""> <br>
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