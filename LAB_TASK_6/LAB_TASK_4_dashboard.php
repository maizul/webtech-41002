<html>
<body>
	<center>
<?php
require_once 'model/model.php';
	require("LAB_TASK_4_header2.php");
if (isset($_SESSION['username'])) {
	echo "<h1><fieldset>Welcome ".$_SESSION['username']."</h1></fieldset>";
}
else{
	$msg="error";
		header("location:LAB_TASK_4_login.php");
}

?>
</center>
</body>
</html>
<?php
    require("LAB_TASK_4_footer.php")
?>