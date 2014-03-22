<!-- Aggregate Application Portal - Copyright 2014 of Natalie Newman -->
<?php
session_start();
include "includes/header.php";
include "includes/connect.php";
include "includes/sidebar-admin.php";
?>

<div class="jumbotron">
	<h1>Apps for <?php echo $os?></h1>
	<p>Text</p>

<?php echo $os?>
<?php echo $user?>

</div>
          
<div class="row">

<?php
   $current_url = $_SERVER['REQUEST_URI'];
   $current_url = substr($current_url, 1);

	$results = $conn->query("SELECT * FROM apps A INNER JOIN device D ON D.DeviceID = A.DeviceID WHERE D.DeviceName = '$os'");
		if ($results) { 
        //output results from database
        while($obj = $results->fetch_object())
        {
			
			echo "<div class=\"col-6 col-sm-6 col-lg-4\">";
			echo '<form method="post" action="cart_update.php">';
			echo '<h2>'.$obj->ApplicationName.'</h2>';
			echo '<p>'.$obj->ApplicationDescription.'</p>';
			echo '<button class="add_to_cart">Add To Cart</button>';
			echo '<input type="hidden" name="product_code" value="'.$obj->ApplicationID.'" />';
			echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
			echo '</form></div>';
     	 }
		 
		}
 ?>



</div><!--/row-->
</div><!--/span-->




<?php
include "includes/footer.php";
?>