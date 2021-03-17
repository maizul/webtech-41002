<!DOCTYPE html>  
<html>  
<head>  
<title>Edit profile</title>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto;
}
</style> 
</head>  
<body>
<?php 

session_start();

if (isset($_SESSION['uname'])){require 'LAB_TASK_4_header2.php';}
else
{
  header("location:LAB_TASK_4_dashboard.php");
} 

$data = file_get_contents("data.json");
$data = json_decode($data, true);
foreach($data as $row)  
{  
  $name = $row["name"];
  $email = $row["email"];
  $gender = $row["gender"];
  $dob = $row["dob"];
}
?> 
<fieldset>
<legend>VIEW PROFILE</legend>
<table align="center" >  
<tr>
  <td>Name</td>
  <td>:</td> 
  <td><?php echo $name ?></td>
</tr>
<tr>
  <td>Email</td>
  <td>:</td> 
  <td><?php echo $email ?></td>
</tr>
<tr>
  <td>Gender</td>
  <td>:</td> 
  <td><?php echo $gender ?></td>
</tr>
<tr>
  <td>Date of Birth</td>
  <td>:</td> 
  <td><?php echo $dob ?></td>
</tr>
  <p style="align-content: right"><img style=" width: 25%;" align="right" src="xcompany.png" alt="Profile Picture"></p>
</table>

</fieldset>
</body>  
</html> 
<?php require ('LAB_TASK_4_footer.php');?>