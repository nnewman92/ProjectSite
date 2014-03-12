<!-- Aggregate Application Portal - Copyright 2014 of Natalie Newman -->
<?php
session_start();
require("includes/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	 	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Login to Aggregate App Portal</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
    
		<!--Cited Bootstrap: Responsive web design-->
    	<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
	<body>
   		<div class="container">
			<form class="form-signin" role="form" action="login.php" method="post">
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="text" class="form-control" placeholder="Username" name="username_login" required autofocus>
                <input class="form-control" type="password"  placeholder="Password" name="user_password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <label class="forgotten"><a href="forgottenpass.php">Forgotten password?</a></label>
            </form>

<?php

//if an admin or user session is already in progress then dont let them log in, redirect to 'index.php'
if (isset($_SESSION['admin']) && ($_SESSION['admin'] == true) || isset($_SESSION['user']) && ($_SESSION['user'] == true)) {
	header ("Location: index.php"); 	
	//if use not logged in then
}else{
	//if username and password are entered, blank before user fills form
	$usr = (isset($_POST['username_login'])? $_POST['username_login']:null);
	$pwd = (isset($_POST['user_password'])? $_POST['user_password']:null);

	$usr = mysqli_escape_string($conn, $usr); //Prevent against SQL Injection by avoiding "\" being executed
	$pwd = mysqli_escape_string($conn, $pwd); //Prevent against SQL Injection by avoiding "\" being executed

	if ($usr && $pwd){	
		$epwd = $pwd;
		$q = "SELECT * FROM users WHERE UName='$usr' LIMIT 1;";
		$resultset = mysqli_query($conn,$q);
		$rowcount = mysqli_num_rows($resultset);

		if ($rowcount==1){ 
			while ($userRow = mysqli_fetch_assoc($resultset)){
				//Get the DB username and password to compare
				$dataBaseEmail = $userRow['UName'];
				$dataBasePass = $userRow['Password'];	
				$userGroup = $userRow['UserLevelID'];
			}
				
		mysqli_free_result($resultset);
		unset($q);
			
		//Compare DB user and pass to those entered
		if ($usr == $dataBaseEmail && $epwd == $dataBasePass){
			//Now that we know they are activated ect, we can create a session based on their privlidges 
			if ($userGroup ==1){ //ADMIN load the console 
				header("Location: index.php");
				$_SESSION['admin'] = true;
			}else{ //Normal User
				header ("Location: logout.php");
				$_SESSION['user'] = true;
				$_SESSION['user'] = $dataBaseEmail;
				}
			}else{//user and pass do not match DB
				echo '<div class="login-error">Incorrect Password, try again</div>';	 
			}
		}else{
			echo '<div class="login-error">Error: There is no such user registered on the system. Please check the username and password entered.</div>';
		}
	}
}
?>
		</div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
