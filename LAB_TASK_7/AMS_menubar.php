<?php
if (isset($_SESSION['uname'])) {
}
else{
    $msg="error";
        header("location:AMS_login.php");
}
?>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <center>
    <div class="menubar">
    <center>
    <fieldset>
    	<p><h4><u>Account</u></h4>
    	<a href='AMS_dashboard.php'> Home </a><span>|</span>
        <a href='AMS_viewprofile.php'> View Profile </a><span>|</span>
        <a href='AMS_editprofile.php'> Edit Profile  </a><span>|</span>
        <a href='AMS_cprofilepic.php'> Change Profile Picture </a><span>|</span>
        <a href='AMS_community.php'> Community </a><span>|</span>
        <a href='AMS_changepass.php'> Change Password </a>  
    </p>
    </fieldset>
</center>
</div>
</body>
</html>