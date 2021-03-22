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
    	if (isset($_POST['updateProduct'])) 
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

		  if (updateProduct($_GET['id'], $data)) 
		  {
		  	echo 'Successfully updated!!';
		  	header('Location: LAB_TASK_5_display.php');
		  }
		}
		if(isset($_GET['id']))
		{
		  $product = showProduct($_GET['id']);  
		}
		else
		{
		  header('Location: LAB_TASK_5_display.php');
		}
 ?>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset>
    	<legend>Edit Product</legend>
    	<label for="name">Name</label><br>
    	<input type="text" id="name" name="name" value="<?php echo $product['Name'] ?>"><br>

		<label for="buy">Buying Price</label><br>
		<input type="text" id="buy" name="buy" value="<?php echo $product['Buying Price'] ?>"><br>

		<label for="sell">Selling Price</label><br>
		<input type="text" id="sell" name="sell" value="<?php echo $product['Selling Price'] ?>"><br>
		  
		<input type="checkbox" id="display" name="display"<?php if($product['Display']== "YES"){echo "checked";} ?>>
		<label for="display">Display</label><br>

  		<input type="submit" name = "updateProduct" value="Save">    	
    </fieldset>
</form>
</center>
</body>
</html>