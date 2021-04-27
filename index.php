<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include_once "stylesheet.php";?>

    <title></title>
  </head>
  <body>
    

    <div class="container">
    	<div class="jumbotron">
    		<h1 class="display-4" align="center">Welcome to</h1>
    		<h1 class="display-1" align="center">Student-HUB</h1>
    		<hr class="my-4">
    		<p class="lead">It uses utility classes for typography and spacing to space content out within the larger container</p>
    	</div>
    	<div class="row">
    		<div class="col">
    			<!-- admin or teacher login form-->
				<form action="login.php" method="POST" class="form-signin">
					<h1 class="h3 mb-3 font-weight-normal">Adminstrator Log In</h1>
					<label for="" class="sr-only">Username :</label>
					<input type="Username" name="username" placeholder="Username" class="form-control" required autofocus><br>
					<label for="" class="sr-only">Password :</label>
					<input type="Password" name="pass" placeholder="Password" class="form-control" required autofocus><br>
					<button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Log In</button>
				</form>
    		</div>
    		<div class="col">
    			<!-- student login form-->
				<form action="student_login.php" method="post" class="form-signin">
					<h1 class="h3 mb-3 font-weight-normal">Student Log in</h1>
					<label for="" class="sr-only">Student Id : </label>
					<input type="number" name="id" placeholder="Enter Id" class="form-control" required autofocus><br>
					<label for="" class="sr-only">Password : </label>
					<input type="password" name="pass" placeholder="Enter Password" class="form-control" required autofocus=""><br>
					<button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Log In</button>
				</form>
    		</div>
    	</div>
    </div>
  



<?php include_once "script.php";?>
</body>
</html>