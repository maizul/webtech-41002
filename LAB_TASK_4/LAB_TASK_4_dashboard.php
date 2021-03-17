<html>
<body>
	<center>
<?php
session_start();
if (isset($_SESSION['uname'])){require 'LAB_TASK_4_header2.php';}
else
{
  header("location:LAB_TASK_4_dashboard.php");
} 
?>
<?php echo "<h1><fieldset>Welcome ".$_SESSION['uname']."</h1></fieldset>";?>
</center>
</body>
</html>
<?php
    require("LAB_TASK_4_footer.php")
?>