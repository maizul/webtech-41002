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
    	if (isset($_POST['search'])) 
		{
		    $products = searchProduct($_POST['name']);
		    require 'LAB_TASK_5_display.php';
		}
    	?>
    <fieldset>
    	<legend>Search Product</legend>
    	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    		<input type="text" name="name" placeholder="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" required>
    		<input type="submit" name="search" value="Search By Name">
  		</form>
    </fieldset>
</center>
</body>
</html>