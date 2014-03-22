<!-- Aggregate Application Portal - Copyright 2014 of Natalie Newman -->
<?php
session_start();
include "includes/header.php";
include "includes/connect.php";
?>
<link rel="stylesheet" type="text/css" href="css/login.css">

<div class="jumbotron">
	<h1>Create users</h1>
    <p>Admin controls</p>
</div>
<div class="container">
	<form class="form-register" role="form" action="admincreateuser.php" method="post">
        <h2 class="form-signin-heading">Register new user</h2>
		<p>*All fields are required to register a new user</p>
        <input class="form-control" type="text" placeholder="Username*" name="username_register" maxlength = "15" required autofocus>
		<input class="form-control" type="text"  placeholder="First Name*" name="user_firstname" maxlength = "25"required>
		<input class="form-control" type="text"  placeholder="Last Name*" name="user_lastname" maxlength = "25"required>
		<input class="form-control" type="text"  placeholder="Email Address*" name="user_email" maxlength = "40"required> 
        <select class="form-control" name="user_level">
     		<option value="0">User Access Level*</option>
   			<option value="1">Admin</option>
   			<option value="2">General</option>
            <option value="3">CEO</option>
		</select>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Register user</button>  
	</form>
</div>

<?php
//on submit do:
if(isset($_POST['submit'])){
	
	//strip all white space beginning/end of admin data entry
	$rusr= trim($_POST['username_register']);
	$rusrfname= trim($_POST['user_firstname']);
	$rusrlname= trim($_POST['user_lastname']);
	$rusremail= trim($_POST['user_email']);
	$usrlevel= trim($_POST['user_level']);
	$dpid="1";//set department ID temporarily
	$rid="1";//set role ID temporarily 
	$randpwd = rand(12345678,99999999);//generate random password for now
			
	//Check database query
	$q = "SELECT * FROM users WHERE UName='$rusr' LIMIT 1;";
	$resultset = mysqli_query($conn,$q);
	$rows = mysqli_num_rows($resultset);
	
		//If user is already registered let administrator know
		if ($rows==1){
			echo '<div class="login-error">User is already registered, send <a href="forgottenpass.php">reset password</a> email.</div>';
		} 
		//If all fields have data
		if (!empty($_POST)){
			
			//If the administrator has select a user access level then add to database
			if($usrlevel!=0){
				
			$registrationQuery = mysqli_query($conn, "INSERT INTO users VALUES ('null', '$rusr','$randpwd','$rusrfname','$rusrlname','$rusremail', NOW(), '$usrlevel', '$dpid', '$rid');");
			
			//If adding record successful notify administrator and email the user their details
			if ($registrationQuery) {
				echo 'New user has been created';
				
				$from = "admin@natalienewman.co.uk"; //admin email address
    			$subject = "Aggregate Application Portal account created";
    			$message = $rusrfname . " " . $rusrlname . " your portal account has been created. Your current password is:" .$randpwd . " please log in to change your password";

   				 $headers = "From:" . $from; mail($rusremail,$subject,$message,$headers);
 			
			}else  die('Invalid query: ' . mysqli_error());
		}
		//If administrator has not chosen a user access level - let them know
		else echo 'Please select a user access level value';
		} 
		//If administrator has not completed all fields - let them know
		else echo'<div class="login-error">Please fill in all fields</div>';
	}
		

?>
