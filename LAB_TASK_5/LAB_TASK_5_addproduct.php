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


		if (isset($_POST['save'])) 
		{
			$data['name'] = $_POST['name'];
			$data['buy'] = $_POST['buy'];
			$data['sell'] = $_POST['sell'];
			if (isset($_POST['display'])) 
			{
				$data['display'] = "YES";
			}
			else
				$data['display'] = "NO";

		  if (addProduct($data)) 
		  {
		  	echo 'Successfully added!!';
		  	header('Location: LAB_TASK_5_display.php');
		  }
		} 
		else 
		{
			echo '';
		}
    	


    	?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	    <fieldset>
	    	<legend>Add Product</legend>
		  <label for="name">Name</label><br>
		  <input type="text" id="name" name="name"><br>
		  <label for="buyingPrice">Buying Price</label><br>
		  <input type="text" id="buy" name="buy"><br>
		  <label for="sellingPrice">Selling Price</label><br>
		  <input type="text" id="sell" name="sell"><br>
		  <hr>
		  <input type="checkbox" id="display" name="display">
		  <label for="display">Display</label><br>
		  <input type="submit" name = "save" value="Save">

	    </fieldset>
	</form>
</center>
</body>
</html>
