<?php
	require("LAB_TASK_4_header2.php");
	
?>
<!DOCTYPE html>
<html>
<body>
<fieldset>
	<legend>Change Profile Picture</legend>
<form action="LAB_TASK_4_upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
</fieldset>
</body>
</html>
<?php
    require("LAB_TASK_4_footer.php")
?>