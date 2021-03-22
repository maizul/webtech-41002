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
if (!isset($_POST['name'])) 
	{
  	require_once ('model.php');
  	$products = showAllproducts();
  	}
?>
    <fieldset>
    	<legend>Display Product</legend>
    	<table>
	        <tr>
	          <th>Name</th>
	          <th>Profit</th>
	          <th colspan="2"></th>
	        </tr>
	        <?php 
	        foreach ($products as $i => $product): 
	          if ($product['Display'] == "YES" || isset($_POST['name'])):
	        ?>
	          <tr>

	            <td><?php echo $product['Name'] ?></td>
	            <td><?php echo $product['Selling Price'] - $product['Buying Price'] ?></td>
	            <td><a href="LAB_TASK_5_editproduct.php?id=<?php echo $product['ID'] ?>">Edit</a></td>
	            <td><a href="LAB_TASK_5_deleteProduct.php?id=<?php echo $product['ID'] ?>">Delete</a></td>
	          </tr>
	        <?php endif; endforeach; ?>
    </table>
    </fieldset>
</center>
</body>
</html>