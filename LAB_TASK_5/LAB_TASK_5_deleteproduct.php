<html>
  <head>
    <style>
.error {color: #FF0000;}
</style>
</head>
  <body>
    <center>
    	<?php
    	require_once 'LAB_TASK_5_menubar.php';
    	require_once 'model.php';
    	if (deleteProduct($_GET['id']))
		{
		    header('Location: LAB_TASK_5_display.php');
		}
    	?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <fieldset>
	  <legend>Delete Product</legend>
	  Name : <?php echo $product['Name'] ?><br>
	  Buying Price : <?php echo $product['Buying Price'] ?><br>
	  Selling Price : <?php echo $product['Selling Price'] ?><br>
	  Displayable :<?php echo $product['Display'] ?><br>
    </fieldset>
</form>
</center>
</body>
</html>