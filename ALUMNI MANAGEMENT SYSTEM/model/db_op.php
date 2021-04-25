<?php
$host="localhost";
$username="root";
$password="";
$database="labtask";
$connection=mysqli_connect($host,$username,$password,$database);
if(!$connection){
	echo "Connection Error";
}
?>