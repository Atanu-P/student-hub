<?php
	require 'session_validator.php';
	require_once 'conn.php';
?>

<h1>Home page</h1>
<button><a href="logout.php" onclick="if(confirm('Are you sure you want to logout ?')) return true; else return false;">Logout</a></button>
<button><a href="reset_pass.php" onclick="if(confirm('Are you sure you want to change the password ?')) return true; else return false;">Change Password</a></button>

<?php
	if($_SESSION['status']=='admin'){
?>
	<button><a href="add_admin.php" onclick="if(confirm('Are you sure you want to add new admin or teacher ?')) return true; else return false;">Add</a></button>
<?php
	} 
?>
	<button><a href="update_admin.php" onclick="if(confirm('Are you sure you want to update detail ?')) return true; else return false;">Update Details</a></button>