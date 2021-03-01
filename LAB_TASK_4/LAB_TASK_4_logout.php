<?php 

session_start();

if (isset($_SESSION['uname'])) {
	session_destroy();
	header("location:LAB_TASK_4_login.php");
	
}

else{
	header("location:LAB_TASK_4_login.php");
}

 ?>