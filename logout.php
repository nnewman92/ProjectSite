<?php
session_start();
require ("includes/connect.php"); //database connection
require ("includes/header-logout.php"); //header template
?>
<div id = "content">
<?php
	session_destroy();
	echo "You are not logged out";
?>
</div><!--END CONTENT-->
<?php
require ("includes/footer.php"); //footer template
?>