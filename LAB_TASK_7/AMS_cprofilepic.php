<?php
	require("AMS_header2.php");
	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <center>
    <div class="container">
<fieldset>
	<legend>Change Profile Picture</legend>
<form action="AMS_upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
</fieldset>
</div>
</center>
</body>
</html>
<?php
    require("AMS_footer.php")
?>