<!DOCTYPE html>  
<html>  
<head>  
<title>Edit profile</title> 
</head>  
<body>
<?php 
session_start();
if (isset($_SESSION['uname'])){require 'LAB_TASK_4_header2.php';}
else
{
  header("location:LAB_TASK_4_login.php");
}

?> 
<style>
.error {color: #FF0000;}
</style>

<?php
$name = $email = $gender = $dob = '';
$nameErr = $emailErr = $genderErr = $dobErr = '';
$message = '';  
$error = '';
$flag=1;  
if($_SERVER["REQUEST_METHOD"] == "POST")  
{  
  if (empty($_POST["name"])) 
  {
    $nameErr = "Name is required";
    $flag=0;
  } 
  else 
  {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z0-9-' _.-]*$/",$name) || str_word_count($name)<2 )
    {
      $nameErr = "Only letters, white space, period, dash allowed and minimum two words";
      $name="";
      $flag=0;
    }
  }

      
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email is required";
    $flag=0;
  } 
  else 
  {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Invalid email format";
      $email="";    
      $flag=0;
    }
  }
  if(empty($_POST["gender"]))  
  {  
    $genderErr = "Select Gender"; 
    $flag=0; 
  }
  else 
  {
    $gender = test_input($_POST["gender"]);
  } 

  if(empty($_POST["dob"]))  
  {  
    $dobErr = "Enter Date of Birth";
    $flag=0;  
  }
  else 
  {
    $dob = test_input($_POST["dob"]);
  }

  if ($flag==1) 
  {
    if(isset($_POST["submit"]))  
    {
      if(file_exists('data.json'))  
      {  
        $current_data = file_get_contents('data.json');  
        $array_data = json_decode($current_data, true);  
        $extra = array(  
        'name'            =>     $_POST['name'],
        'email'           =>     $_POST['email'],
        'gender'          =>     $_POST["gender"],  
        'dob'             =>     $_POST["dob"]);  
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('data.json', $final_data))  
        {  
          $message = "File Appended Success fully";  
        } 
      } 
      else  
      {  
        $error = 'JSON File not exits';  
      }
    }  
  }    
} 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
<center>
<fieldset>
<legend>EDIT PROFILE</legend>                 
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table align="center"></table>
    <tr>
  <label for="name">
    <td>Name</td>
    <td>:</td></label>
  <td><input type="text" id="name" name="name" value="<?php echo $name ?>"></td>
  <td><span class="error"> <?php echo $nameErr;?></span></td>
</tr><br>
<tr>
  <label for="email">
    <td>Email</td>
    <td>:</td></label>
  <td><input type="text" id="email" name="email" value="<?php echo $email ?>"></td>
  <td><span class="error"> <?php echo $emailErr;?></span></td>
</tr><br>

<tr>
  <label for="gender">
  <td>Gender</td>
  <td>:</td></label>
  <td><input type="radio" id="male" name="gender" value="male"<?php if("male" == $gender){echo "checked";}?>>
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female"<?php if("female" == $gender){echo "checked";} ?>>
  <label for="female">Female</label> 
  <input type="radio" id="other" name="gender" value="other"<?php if("other" == $gender){echo "checked";} ?>>
  <label for="other">Other </label></td>
  <td><span class="error"> <?php echo $genderErr;?></span></td>
</tr><br>
<tr>
<label for="dob">
<td>Date of Birth</td>
<td>:</td></label>
  <td><input type="date" id="dob" name="dob" value="<?php echo $dob ?>"></td>
  <td><span class="error"> <?php echo $dobErr;?></span></td>
</tr><br>

<input type="submit" name="submit" value="Submit">
</form>  
</fieldset>
</center>
<?php
echo $error;
echo "<br>";
echo $message;
echo "<br>";
?>
<?php require 'LAB_TASk_4_footer.php';?>
</body>  
</html>  