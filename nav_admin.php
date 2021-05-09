<nav class="navbar navbar-expand-lg sticky-top navbar-dark unique-color" id="adminNavbar">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
  			<span class="navbar-toggler-icon"></span>	
  		</button>
  		<div class="container">
  		<div class="collapse navbar-collapse" id="navbar">
  			<ul class="navbar-nav mr-auto mt-lg-0">
  				
  				<li class="nav-item active">
  					<a class="nav-link" href="add_student.php">Student</a>
  				</li>
  				<li class="nav-item">
  					<a class="nav-link" href="#">Study Material</a>
  				</li>
  				<li class="nav-item">
  					<a class="nav-link" href="#">Assignment</a>
  				</li>
  				<li class="nav-item">
  					<a class="nav-link" href="#">Live</a>
  				</li>
  			</ul>

  			<span class="navbar-text white-text">
  				Logged in as <?= $_SESSION['username'];?>
  			</span>
  			
  		</div></div>
  	</nav>

<!--h1>Add student page</h1-->
	<div class="container">
	<div class="card p-4 mb-4 mt-2">
	<div class="row">
	<div class="col" align="center">
	
	<a href="reset_pass.php" onclick="if(confirm('Are you sure you want to change the password ?')) return true; else return false;" class="btn btn-sm btn-info">Change Password</a>

  <a href="update_admin.php" onclick="if(confirm('Are you sure you want to update detail ?')) return true; else return false;" class="btn btn-sm btn-info">Update Details</a>

<?php
	if($_SESSION['status']=='admin'){
?>
	<a href="add_admin.php" onclick="if(confirm('Are you sure you want to add new admin or teacher ?')) return true; else return false;" class="btn btn-sm btn-info">Add Admin / Teacher</a>
<?php
	} 
?>
  <a href="logout.php" onclick="if(confirm('Are you sure you want to logout ?')) return true; else return false;" class="btn btn-sm btn-danger">Logout</a>
	
	</div>
	</div>
	</div>
	</div>