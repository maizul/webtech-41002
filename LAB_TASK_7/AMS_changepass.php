<!DOCTYPE HTML>  
<html>
<?php
  require("AMS_header2.php");
?>
<?php
$passwordErr = $opasswordErr = $cpasswordErr = "";
$password = $opassword = $cpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"]) && !($_POST["password"] == $_POST["opassword"])) {
    
    $password = test_input($_POST["password"]);
    $cpassword = test_input($_POST["cpassword"]);
    if (strlen($_POST["password"]) < 8) {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    else if (!preg_match("/^(?!.* )(?=.*[^a-zA-Z0-9]).{8,}$/m", $password)) {
      $passwordErr="Password should include at least one special character(@,#,$,%)";
    }
}
elseif(!empty($_POST["password"]) && ($_POST["password"] == $_POST["opassword"])) {
    $cpasswordErr = "Please Check You've Entered a correct Password";
} 
else {
     $passwordErr = "Please enter password   ";
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <center>
    <div class="container">
<fieldset>
  <legend>Change Password</legend>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<table align="center" >  
<tr><td><span class="error">* required field</span></td></tr>
<tr> 
  <td>Current Password</td>
  <td>:</td>
  <td><input type="password" name="opassword"></td>
  <td><span class="error">* <?php echo $opasswordErr;?></span></td>
</tr>
<tr> 
  <td>New Password</td>
  <td>:</td>
  <td><input type="Password" name="password"></td>
  <td><span class="error">* <?php echo $passwordErr;?></span></td>
</tr>
<tr>
  <td>Retype New Password</td>
  <td>:</td>
  <td><input type="Password" name="cpassword"></td>
  <td><span class="error">* <?php echo $cpasswordErr;?></span></td>
</tr>
<tr>
  <td align="right" colspan="4"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
</fieldset>
</div>
</center>
</body>
</html>
<?php
    require("AMS_footer.php")
?>