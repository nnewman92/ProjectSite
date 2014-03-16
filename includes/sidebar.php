
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
	<div class="list-group">
		<a href="allapps.php" class="list-group-item">View all apps</a>
        <a href="device.php" class="list-group-item">Browse by device</a>
        <a href="category.php" class="list-group-item">Browse by category</a>
        <a href="toppaid.php" class="list-group-item">Top 25 apps</a>
        <a href="freeapps.php" class="list-group-item">Top free apps</a>
        <a href="bugs.php" class="list-group-item">Update bugs</a>
	</div>



<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Shopping Cart</h3>
  </div>
  <div class="panel-body">
    <?php
if(isset($_SESSION["products"]))
{
    $total = 0;
    echo '<div>';
    foreach ($_SESSION["products"] as $cart_itm)
    {
        echo '<p>';
        
        echo '<h4>'.$cart_itm["name"].'';
		echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'"> x</a></span></h4>';
        echo '</p>';
		echo '<hr>';
        $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
        $total = ($total + $subtotal);
    }
    echo '</div><br>';
    echo '<p class="check-out-txt"><strong>Total : '.$currency.$total.'</strong></p><p> <a href="view_cart.php">Check Out</a></p>';
    echo '<p class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></p>';
}else{
    echo 'Your Cart is empty';
}
?>
</div>

</div>

</div><!--/span-->

</div><!--/row-->

