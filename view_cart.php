<?php
session_start();
include_once("includes/connect.php");
include "includes/header.php";
?>

	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
							</div>
							<div class="col-xs-6">
								<button type="button" class="btn btn-primary btn-sm btn-block" action="index.php">
									<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
                

<?php

    if(isset($_SESSION["products"]))
    {
        $total = 0;
        echo '<form method="post" action="PAYMENT-GATEWAY">';
        echo '<ul>';
        $cart_items = 0;
        foreach ($_SESSION["products"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
           $results = $conn->query("SELECT ApplicationName, ApplicationDescription FROM apps WHERE ApplicationID='$product_code' LIMIT 1");
           $obj = $results->fetch_object();
           
            echo '<div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name">';
							
            echo '<strong>'.$obj->ApplicationName.'</strong></h4> ';
			
			echo '<h4><small>'.$obj->ApplicationDescription.'</small></h4>';
			
			
			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">remove</a></span>';
          
            
            
            echo '</div>';
			
      
            //$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
            //$total = ($total + $subtotal);

            echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->ApplicationName.'" />';
            echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
            echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->ApplicationDescription.'" />';
            $cart_items ++;
            echo '</div>';
			echo '<hr>';
        }
        echo '<span class="check-out-txt">';
        //echo '<strong>Total : '.$currency.$total.'</strong>  ';
        echo '</span>';
        echo '</form>';
		echo '</div>';
        
    }else{
        echo 'Your Cart is empty';
    }
?>





					
						
						
								
						
						</div>
					</div> 
					
				</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Total <strong>$50.00</strong></h4>
						</div>
						<div class="col-xs-3">
							<button type="button" class="btn btn-success btn-block">
								Checkout
							</button>
						</div>
					</div>
				</div>
			</div>
		



<?php
include "includes/sidebar.php";
?>

<?php
include "includes/footer.php";
?>
