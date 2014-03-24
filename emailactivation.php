<?php
session_start();
include "includes/header.php";
include "includes/connect.php";
?>
<link rel="stylesheet" type="text/css" href="css/login.css">
<div class="jumbotron">
	<h1>New users</h1>
    <p>Register your details</p>
</div>

<?php
if(isset($_GET["passkey"])) {
$_SESSION['passkey']=$passkey;
$passkey=$_GET['passkey'];

// Retrieve data from table where row that match this passkey 
$sql1="SELECT FirstName FROM users WHERE confirm_code ='$passkey'";
$result1=mysqli_query($conn, $sql1);
$count = mysqli_num_rows($result1);
$updateactive="1";

	if ($count==1){
		$activeQuery = mysqli_query($conn, "UPDATE users SET Activate='$updateactive' WHERE confirm_code='$passkey'"); 
		//If adding record successful notify administrator and email the user their details
		if ($activeQuery) {
			$row = mysqli_fetch_row($result1);
			echo "Welcome " .$row[0]. " to the Aggregate Application Portal, please update your details:";
		} else die('Invalid query: ' . mysqli_error());
	}else echo "Wrong Confirmation code";
}
?>
<div class="container">
	<form class="form-activate" role="form" action="emailactivation.php" method="post">
        <h2 class="form-signin-heading">Register your details</h2>
		<p>*All fields are required</p>
        <input class="form-control" type="password" placeholder="Current password*" name="current_password" maxlength = "30" required autofocus>
        <input class="form-control" type="password" placeholder="New password*" name="new_password" maxlength = "30" required autofocus>
        <input class="form-control" type="password" placeholder="Confirm new password*" name="confirmnew_password" maxlength = "30" required autofocus>
		<select class="form-control" name="department_category">
     		<option value="0">Department category*</option>
   			<option value="1">Administrative services</option>
            <option value="2">Business Development</option>
            <option value="3">Health & Safety</option>
            <option value="4">Finance & Accounting</option>
            <option value="5">HR</option>
            <option value="6">IT</option>
            <option value="7">Legal</option>
            <option value="8">Research & Development</option>
            <option value="9">Sales</option>
            <option value="10">Science</option>
		</select>		
		<select class="form-control" name="role">
     		<option value="0">Role*</option>
   			<option value="1">Director</option>
            <option value="2">Manager</option>
            <option value="3">Graduate</option>
            <option value="4">Intern</option>
            <option value="5">Assistant</option>
            <option value="6">Head of department</option>
		</select>		
        <input type="hidden" name="passkey" value = "<?php echo $passkey;?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submitdetails">Update details</button>  
	</form>
</div>

<?php
//on submit do:
if(isset($_POST['submitdetails'])){

	//strip all white space beginning/end of admin data entry
	$rcpwd= trim($_POST['current_password']);
	$usrnewpwd= trim($_POST['new_password']);
	$usrconfirm_newpwd= trim($_POST['confirm_newpassword']);
	$usrdepartment=trim($_POST['department_category']);
	$usrrole=trim($_POST['role']);

	//Check database query
	$q2 = "SELECT * FROM users WHERE Password='$rcpwd' LIMIT 1;";
	$resultset2 = mysqli_query($conn,$q2);
	$rows2 = mysqli_num_rows($resultset2);
	$passkey = trim($_POST["passkey"]);
	$updateactive2="2";
	
		//If user exists:
		if ($rows2==1){
			//If all fields have data
		if (!empty($_POST)){
				
  				 		//If the administrator has select a user access level then add to database
						if($usrdepartment!=0){ 
							if($usrrole!=0){
								
					// make sure passwords match then save**
					
							$updateQuery = mysqli_query($conn, "UPDATE users SET Password='$usrnewpwd', DepartmentID='$usrdepartment' , Activate='$updateactive2', RoleID='$usrrole' WHERE confirm_code='$passkey';"); 
	 
							//If adding record successful notify administrator and email the user their details
							if ($updateQuery) {
								echo 'You can now access your acccount <a href="index.php">Access account</a>';
               				 exit;   
							}else  die('Invalid query: ' . mysqli_error());
						}
						//If administrator has not chosen a user access level - let them know
						else die('Invalid query: ' . mysqli_error());
					}
					//If not completed all fields - let them know
	else echo'<div class="login-error">Please fill in all fields</div>';
			} 
			else echo '<div class="login-error">Error password incorrect please try again</div>';
		}else echo '<div class="login-error">This account has already been activated, please login</div>';
	
}
?>