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
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>LAB_TASK_3.4</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  User Name: <input type="text" name="username">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  New Password : <input type="Password" name="password">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Retype New Password : <input type="Password" name="cpassword">
  <span class="error">* <?php echo $cpasswordErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Date of Birth :
  <input type="date" name="dob" placeholder="DD-MM-YYYY" ><span class="error">* <?php echo $dobErr;?></span>
  <br><br>
    <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $gender;
echo "<br>";
echo $dob;
echo "<br>";
