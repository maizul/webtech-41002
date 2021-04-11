<?php
    require("AMS_header.php");
?>
<?php 
session_start();

$username="admin";
$password="admin";

if (isset($_POST['uname'])) {
	if ($_POST['uname']==$username && $_POST['pass']==$password) {
		$_SESSION['uname'] = $username;
		header("location:AMS_dashboard.php");
	}
	else{
		$msg="username or password invalid";
		echo "<script>alert('uname or pass incorrect!')</script>";
	}

}

 ?>
 <!DOCTYPE html>
 <html>
 <body>
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
    <div class="container">
<fieldset>
	<legend>Login</legend>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<table align="center">
		<tr>
			<!--<th colspan="2"><h2>Login</h2></th>-->
		</tr>
		<?php if(isset($msg)){?>
		    <tr>
		      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
		    </tr>
    	<?php } ?>
		<tr>
			<td>username</td>
			<td><input type="text" name="uname"></td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="password" name="pass"></td>
		</tr>
		<tr>
			<td align="right" colspan="2"><input type="submit" name="login" value="login"></td>
		</tr>
	</table>
	
</form>
</fieldset>
</div>
</body>
</html>

<?php
    require("AMS_footer.php")
?>