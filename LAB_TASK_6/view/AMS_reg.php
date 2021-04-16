<?php
    require("../view/AMS_header.php");
    require("../controller/reg_control.php")
?>
<!DOCTYPE HTML>  
<html>
<head> 
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<fieldset>
    <legend>Registration</legend>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php   
  if(isset($error))  
  {  
    echo $error;  
  }  
?>
<table align="center" >  
<tr><td><span class="error">* required field</span></td></tr>
<tr>
  <td>Name</td>
  <td>:</td> 
  <td><input type="text" name="name"></td>
  <td><span class="error">* <?php echo $nameErr;?></span></td>
</tr>
  <tr>
  <td>E-mail</td>
  <td>:</td>
  <td><input type="text" name="email"></td>
  <td><span class="error">* <?php echo $emailErr;?></span></td>
</tr>
<tr>
  <td>User Name</td>
  <td>:</td>
  <td><input type="text" name="username"></td>
  <td><span class="error">* <?php echo $usernameErr;?></span></td>
  </tr>
<tr>
  <td>New Password</td>
  <td>:</td>
  <td><input type="Password" name="password"></td>
  <td><span class="error">* <?php echo $passwordErr;?></span></td>
</tr>
<tr>
  <td>Confirm Password</td>
  <td>:</td>
  <td><input type="Password" name="cpassword"></td>
  <td><span class="error">* <?php echo $cpasswordErr;?></span></td>
</tr>
<tr>
  <td>Gender</td>
  <td>:</td>
  <td><input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other</td>
  <td><span class="error">* <?php echo $genderErr;?></span></td>
</tr>
<tr>
  <td>Date of Birth</td>
  <td>:</td>
  <td><input type="date" name="dob" placeholder="DD-MM-YYYY" ></td>
  <td><span class="error">* <?php echo $dobErr;?></span></td>
</tr>
<tr>
  <td align="right" colspan="6"><input type="submit" name="submit" value="Submit"></td>
</tr>
    <?php  
        if(isset($message))  
          {  
            echo $message;  
          }  
    ?> 
</table>
</fieldset>
</form>
</body>
</html>

<?php
echo "<tr><td><h2>Your Input:</h2></td></tr>";
echo "<tr><td> $name </td></tr>";
echo "<br>";
echo "<tr><td> $email </td></tr>";
echo "<br>";
echo "<tr><td> $username </td></tr>";
echo "<br>";
echo "<tr><td> $password </td></tr>";
echo "<br>";
echo "<tr><td> $gender </td></tr>";
echo "<br>";
echo "<tr><td> $dob </td></tr>";
echo "<br>";
?> 

<?php
    require("../view/AMS_footer.php")
?>
