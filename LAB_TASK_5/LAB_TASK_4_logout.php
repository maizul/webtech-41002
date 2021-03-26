<?php 

session_start();

if (isset($_SESSION['username'])) {
	session_destroy();
	header("location:LAB_TASK_4_login.php");
	
}

else{
	header("location:LAB_TASK_4_login.php");
}

 ?>