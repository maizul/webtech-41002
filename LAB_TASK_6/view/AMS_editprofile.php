<?php
    require("../view/AMS_header2.php");
    require("../controller/edit_control.php");
    require("../controller/view_control.php");
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
    <legend>Edit Profile</legend>
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
  <td><input type="text" id="name" name="name" value="<?php echo $name?>"></td>
  <td><span class="error">* <?php echo $nameErr;?></span></td>
</tr>
  <tr>
  <td>E-mail</td>
  <td>:</td>
  <td><input type="text" name="email" value="<?php echo $email?>"></td>
  <td><span class="error">* <?php echo $emailErr;?></span></td>
</tr>
<tr>
  <td>User Name</td>
  <td>:</td>
  <td><input type="text" name="username" value="<?php echo $username?>"></td>
  <td><span class="error">* <?php echo $usernameErr;?></span></td>
  </tr>
<tr>
  <td>Gender</td>
  <td>:</td>
  <td><input type="radio" name="gender" value="female"<?php if("female" == $gender){echo "checked";} ?>>Female
  <input type="radio" name="gender" value="male"<?php if("male" == $gender){echo "checked";} ?>>Male
  <input type="radio" name="gender" value="other"<?php if("other" == $gender){echo "checked";} ?>>Other</td>
  <td><span class="error">* <?php echo $genderErr;?></span></td>
</tr>
<tr>
  <td>Date of Birth</td>
  <td>:</td>
  <td><input type="date" name="dob" value="<?php echo $dob?>" placeholder="DD-MM-YYYY" ></td>
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
    require("../view/AMS_footer.php")
?>
