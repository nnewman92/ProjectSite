<!-- Aggregate Application Portal - Copyright 2014 of Natalie Newman -->
<?php
$db_host =  "localhost";
$db_pwd = "";
$db_usr = "root";
$db_name="appportalgsk"; // Database name 
$conn = mysqli_connect($db_host, $db_usr, $db_pwd, $db_name);
if (!$conn){
	echo "<p>server connection error: mysqli_connect_error()</p>";
}else
	$_SESSION['conn'] = $conn; //database connection status transfer;
?>

