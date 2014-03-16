<!-- Aggregate Application Portal - Copyright 2014 of Natalie Newman -->
<?php
include "includes/header.php";
include "includes/connect.php";
?>

<style>
.glyphicon-lg{font-size:3em}
.blockquote-box{border-right:5px solid #E6E6E6;margin-bottom:25px}
.blockquote-box .square{width:100px;min-height:50px;margin-right:22px;text-align:center!important;background-color:#E6E6E6;padding:20px 0}

</style>


<div class="jumbotron">
	<h1>Browse by category</h1>
	<p>Text</p>

</div>
        
    <div class="row">
        <h2>Categories</h2>
        <br>
        <div class="col-md-12">
        
        <?php
		
		$results = $conn->query("SELECT * FROM categories");
		if ($results) { 
        //output results from database
        while($obj = $results->fetch_object())
        {
			
			echo '<div class="blockquote-box clearfix"><div class="square pull-left">';
			echo '<img src="images/categories/'.$obj->CategoryImage.'" alt="" class="" /></div>';
			echo '<h4>'.$obj->CategoryName.'</h4>';
			echo '<p>'.$obj->CategoryDescription.'</p>';
			echo '<p><a href="/">View Apps</a></p></div>';
			
     	 }
		 
		}
		
		?>
        
        </div>
    </div>

</div><!--/span-->

<?php
include "includes/sidebar.php";
?>

<?php
include "includes/footer.php";
?>