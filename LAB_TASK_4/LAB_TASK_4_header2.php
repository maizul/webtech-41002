
<html>
  <head>
    <style>
.error {color: #FF0000;}
</style>
</head>
  <body>
    <fieldset>
    	<a href="LAB_TASK_4_dashboard.php"><p style="text-align: left"><img src="xcompany.png" width="200" height="100"></p></a>
    	<p style="text-align:right"><span>Logged in as</span>
    	<a href='LAB_TASK_4_viewprofile.php'><?php echo $_SESSION['uname']?></a><span>|</span>
    	<a href='LAB_TASK_4_logout.php'> logout </a>
    </p>
    </fieldset>
</form>
</center>
</body>
</html>

<?php
require ("LAB_TASK_4_menubar.php");
?>