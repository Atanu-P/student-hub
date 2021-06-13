<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include_once "stylesheet.php";?>

    <title>S-HUB | Log In</title>
  </head>
  <body>
    

    <div class="container mt-1">		<!-- bootstrap container -->
    	<div class="jumbotron">
    		<h1 class="display-4" align="center">Welcome to</h1>
    		<h1 class="display-1" align="center">Student-HUB</h1>
    		
    		<p class="lead"></p>
    	</div>
    	<div class="row">		<!-- bootstrap container row -->
    		<div class="col-sm text-center">
    			<!-- admin or teacher login form-->
				<form action="login.php" method="POST" class="form-signin">
					<img class="mb-4" src="svgs\portrait.svg" alt="" width="72" height="72" align="center">
					<h1 class="h3 mb-3 font-weight-normal">Adminstrator / Teacher Log-In</h1>
					<label for="" class="sr-only">Username :</label>
					<input type="Username" name="username" placeholder="Username" class="form-control" required autofocus><br>
					<label for="" class="sr-only">Password :</label>
					<input type="Password" name="pass" placeholder="Password" class="form-control" required autofocus><br>
					<button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Login</button>
				</form>
    		</div>
    		<div class="col-sm text-center">
    			<!-- student login form-->
				<form action="student_login.php" method="post" class="form-signin">
					<img class="mb-4" src="svgs\user-friends.svg" alt="" width="72" height="72" align="center">
					<h1 class="h3 mb-3 font-weight-normal">Student Log-In</h1>
					<label for="" class="sr-only">Student Id : </label>
					<input type="number" name="id" placeholder="Student Id" class="form-control" required autofocus><br>
					<label for="" class="sr-only">Password : </label>
					<input type="password" name="pass" placeholder="Password" class="form-control" required autofocus=""><br>
					<button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Login</button>
				</form>
    		</div>
    	</div>		<!-- bootstrap container row end -->

    	<div class="row mt-5">		<!-- bootstrap container row -->
    		<div class="col text-center">
    			<footer class="page-footer font-small"> 
    			 <div class="footer-copyright text-center py-3 white"><p class="text-dark">Developed by Atanu-Pal</p>
				 		</div>
  				</footer>
			</div>
		</div>		<!-- bootstrap container row end -->
    </div>		<!-- bootstrap container end -->
  



<?php include_once "script.php";?>
</body>
</html>