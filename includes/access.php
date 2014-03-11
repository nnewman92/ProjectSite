<!-- Aggregate Application Portal - Copyright 2014 of Natalie Newman -->
<?php
//build connection
$connect=mysql_connect("localhost","root","","appportalgsk") ;

//if(!$connect)
//{
//	die ("Unable to locate required database");
//} 

//Check input
$username = $_POST["username"];
$password = $_POST["password"];

$accessquery=("SELECT * FROM users WHERE UserName ='$username' and Password='$password'");
 $result=mysqli_query($accessquery);
 $num=mysqli_num_rows($result);
 
if($num<0)//login name was found
{
redirect('index.php');
} else

?>
