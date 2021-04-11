<html>
<?php
	require("AMS_header2.php");
if (isset($_SESSION['uname'])) {
    $detail = file_get_contents('data_reg.json');
    $detailok = json_decode($detail,true);
    foreach($detailok as $row)
    {
        $name = $row["name"];
        $username = $row["username"];
        $email = $row["email"];
        $gender = $row["gender"];
        $dob = $row["dob"];

    }
}
else{
	$msg="error";
		header("location:AMS_login.php");
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
<legend>Home</legend>
  <h2>Welcome <?php echo $username ?></h2>
</fieldset>
</div>
</center>
</body>
</html>

<?php
    require("AMS_footer.php")
?>