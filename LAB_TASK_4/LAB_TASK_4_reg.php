<?php
    require("LAB_TASK_4_header.php");
?>
<!DOCTYPE HTML>  
<html>
<head> 
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
$nameErr = $emailErr = $dobErr = $genderErr = $usernameErr = $passwordErr = $cpasswordErr =   "";
$name = $email = $dob = $gender = $username = $password = $cpassword = "";
$message = '';  
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else { 
    if (str_word_count($_POST["name"])>=2){
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' _]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
  }
    else{
    $nameErr = "Type atleast two words";
  }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["username"])) {
    $usernameErr = "User Name is required";
  } else { 
    if (str_word_count($_POST["username"]) ==1 && strlen($_POST["username"])>=2) {
      $username = test_input($_POST["username"]);
      if (!preg_match("/^[a-z0-9.-_]/i",$username)) {
        $usernameErr = "Only alpha numeric characters, period, dash or
underscore allowed";
      }
      }
    else {
    $usernameErr = "Type atleast two characters without any space";
  }
  }

  if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
    
    $password = test_input($_POST["password"]);
    $cpassword = test_input($_POST["cpassword"]);
    if (strlen($_POST["password"]) < '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
      }
    elseif(!preg_match("@[0-9]+@",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
      }
    elseif(!preg_match("@[A-Z]+@",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
      }
    elseif(!preg_match("@[a-z]+@",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
      }
    elseif(!preg_match("/^(?!.* )(?=.*[^a-zA-Z0-9]).{8,}$/m", $password)) {
          $passwordErr="Password should include at least one special character(@,#,$,%)";
        }
  } 
else {
   $passwordErr = "Please enter password   ";
}
    
   if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  }else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["dob"])) {
    $dobErr = "Date of birth is required";
  } else {
    $dob = test_input($_POST["dob"]);
  }

  if(isset($_POST["submit"])) {
    if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }  
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter Email</label>";  
      }  
      else if(empty($_POST["username"]))  
      {  
           $error = "<label class='text-danger'>Enter Username</label>";  
      } 
      else if(empty($_POST["password"]))  
      {  
           $error = "<label class='text-danger'>Enter Password</label>";  
      }  
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Enter Gender</label>";  
      }  
      else if(empty($_POST["dob"]))  
      {  
           $error = "<label class='text-danger'>Enter Date of Birth</label>";  
      }   
      else  
      {  
        if(file_exists('data_reg.json'))  
          {  
            $current_data = file_get_contents('data_reg.json');  
            $array_data = json_decode($current_data, true);  
            $extra = array(  
                           'name'               =>     $_POST['name'],  
                           'email'          =>     $_POST["email"],  
                           'username'     =>     $_POST["username"],
                           'password'     =>     $_POST["password"],
                           'gender'     =>     $_POST["gender"],
                           'dob'     =>     $_POST["dob"]
                      );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data);  
            if(file_put_contents('data_reg.json', $final_data))  
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
?>
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
    require("LAB_TASK_4_footer.php")
?>
