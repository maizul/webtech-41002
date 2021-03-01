<html>
<body>
<center>
<?php
	require("LAB_TASK_4_header2.php");
if (isset($_SESSION['uname'])) {
	echo "<h1><fieldset>Welcome ".$_SESSION['uname']."</h1></fieldset>";
}
else{
	$msg="error";
		header("location:LAB_TASK_4_login.php");
}
?>

<?php
    require("LAB_TASK_4_footer.php")
?>