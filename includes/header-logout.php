<!-- Aggregate Application Portal - Copyright 2014 of Natalie Newman -->
<?php
$user_agent = getenv("HTTP_USER_AGENT");
$os = "";

if (strpos($user_agent, "Win") !== FALSE) {
    $os = "Windows"; 
}
else if(strpos($user_agent, "Mac") !== FALSE) {
    $os = "Mac";
}
else if(strpos($user_agent, "iPhone") !== FALSE) {
    $os = "iPhone";
}
else if(strpos($user_agent, "iPad") !== FALSE) {
    $os = "iPad";
}
else if(strpos($user_agent, "Android") !== FALSE) {
    $os = "Android";
}
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Logged out of Aggregate App Portal</title>
        
		<!-- Cite: Bootstrap responsive web design-->
		<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/offcanvas.css">
	</head>
 	
    <body>
	<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		<div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Aggregate App Portal</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="login.php">Login</a></li>
            	<li><a href="help.php">Help & Contact</a></li>
         	 </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->

	<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
		<p class="pull-right visible-xs">
			<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Navigation bar</button>
        </p>