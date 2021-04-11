<?php
session_start();
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
    <div class="header2">
    <fieldset>
    	<a href="AMS_dashboard.php"><h1>ALUMNI Management System</h1></a>
    	<p style="text-align:right"><span>Logged in as</span>
    	<a href='AMS_viewprofile.php'><?php echo $_SESSION['uname']?></a><span>|</span>
    	<a href='AMS_logout.php'> logout </a>
    </p>
    </fieldset>
</div>
</center>
</body>
</html>

<?php
require ("AMS_menubar.php");
?>