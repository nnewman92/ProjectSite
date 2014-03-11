<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	 	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Bootstrap 101 Template</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
    
		<!--Cited Bootstrap: Responsive web design-->
    	<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
	<body>
   		<div class="container">
			<form class="form-signin" role="form" action="includes/access.php" method="POST">
				<h2 class="form-signin-heading">Please sign in</h2>
               	<input class="form-control" type="text" name="username" required autofocus>
        		<input class="form-control" type="password"  name="password" required>
        		<label class="checkbox"><input type="checkbox" value="remember-me"> Remember me</label>
        		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
         		<label class="forgotten">Forgotten password?</label>
			</form>

		</div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
