
<?php
    require("LAB_TASK_4_header.php");
?>
<?php 

session_start();

$username="admin";
$password="admin";
$sname="Bob";
$email="bob@aiub.edu";
$gender="male";
$dob="1998-09-19";

if (isset($_POST['uname'])) {
	//$_POST['name'];
	//$_POST['email'];
	//$_POST['gender'];
	//$_POST['dob'];
	if ($_POST['uname']==$username && $_POST['pass']==$password) {
		$_SESSION['uname'] = $username;
		$_SESSION['name']=$name;
		$_SESSION['email']=$email;
		$_SESSION['gender']=$gender;
		$_SESSION['dob']=$dob;
		header("location:LAB_TASK_4_dashboard.php");
	}
	else{
		$msg="username or password invalid";
		echo "<script>alert('uname or pass incorrect!')</script>";
	}

}

 ?>
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

<?php
    require("LAB_TASK_4_footer.php")
?>