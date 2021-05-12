<nav class="navbar navbar-expand-lg sticky-top navbar-dark default-color" id="adminNavbar">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
  			<span class="navbar-toggler-icon"></span>	
  		</button>
  		<div class="container">
  		<div class="collapse navbar-collapse" id="navbar">
  			<ul class="navbar-nav mr-auto mt-lg-0">
  				
  				<li class="nav-item active">
  					<a class="nav-link" href="student_profile.php">Profile</a>
  				</li>
  				<li class="nav-item">
  					<a class="nav-link" href="view_study_material.php">Study Material</a>
  				</li>
  				<li class="nav-item">
  					<a class="nav-link" href="#">Live</a>
  				</li>
  			</ul>

  			<span class="navbar-text white-text">
  				Logged in as <?= $_SESSION['name'] ?><a href="student_logout.php" onclick="if(confirm('Are you sure you want to logout ?')) return true; else return false;" class="btn btn-sm btn-danger">Logout</a>
  				<!-- link to student logout page after conformation -->
  			</span>
  			
  		</div></div>
  	</nav>