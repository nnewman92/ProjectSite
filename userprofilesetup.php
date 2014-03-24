<!-- Aggregate Application Portal - Copyright 2014 of Natalie Newman -->
<?php
session_start();
include "includes/header.php";
include "includes/connect.php";
?>

<div class="jumbotron">
	<h1>User profile set up</h1>
	<p>Change your password</p>

<?php 
$passkey = $_GET['passkey'];
echo $passkey;
?>

</div>