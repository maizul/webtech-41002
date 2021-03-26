<?php
if (isset($_SESSION['uname'])) {
}
else{
    $msg="error";
        header("location:LAB_TASK_4_login.php");
}
?>
<html>
  <head>
    <style>
.error {color: #FF0000;}
</style>
</head>
  <body>
    <center>
    <fieldset>
    	<p><h4><u>Account</u></h4>
    	<a href='LAB_TASK_4_dashboard.php'> Dashboard </a><span>|</span>
        <a href='LAB_TASK_4_viewprofile.php'> View Profile </a><span>|</span>
        <a href='LAB_TASK_4_editprofile.php'> Edit Profile  </a><span>|</span>
        <a href='LAB_TASK_4_cprofilepic.php'> Change Profile Picture </a><span>|</span>
        <a href='LAB_TASK_4_changepass.php'> Change Password </a>  
    </p>
    </fieldset>
</center>
</form>
</center>
</body>
</html>