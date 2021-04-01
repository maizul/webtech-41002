
<?php
session_start();
    require("LAB_TASK_4_header.php");
    require_once 'model/model.php';
    
$usernameErr = $passwordErr = "";
$username = $password = "";

if (isset($_POST['username'])) {
	$data=searchData($_POST['username']);
	if($data!= null)
	{
	  	$password = $data["password"];
	  	$username = $data["username"];
	}
	
	if ($_POST['username']==$username && $_POST['password']==$password) {
		$_SESSION['username'] = $username;
		header("location:LAB_TASK_4_dashboard.php");
	}
	else{
		$msg="username or password invalid";
		echo "<script>alert('username or password incorrect!')</script>";
	}

}
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<input type="checkbox" id="remember_me" name="remember_me">
  		<label for="remember_me">Remember Me</label><br><br>
		<tr>
			<td align="right" colspan="2"><input type="submit" name="login" value="login"></td>
		</tr>
	</table>
	
</form>
</fieldset>

<?php
    require("LAB_TASK_4_footer.php")
?>