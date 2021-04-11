<html>
<?php
	require("AMS_header2.php");
$username=$_SESSION['uname'];
$poststat="";
$poststatErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["poststat"])) {
    $poststatErr = "Empty Post";
  } else {
    $poststat = $_POST["poststat"];
  }
  if(isset($_POST["submit"])) {
    if(empty($_POST["poststat"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }
      else  
      {  
        if(file_exists('aiub_com.json'))  
          {  
            $current_data = file_get_contents('aiub_com.json');  
            $array_data = json_decode($current_data, true);  
            $extra = array( 
                           'poststat'               =>     $_POST['poststat'],  
                      );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data);  
            if(file_put_contents('aiub_com.json', $final_data))  
            {  
              $message = "Post Successful";  
            }  
          }  
          else  
              {  
                $error = '';  
              }
  }
}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
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
    <img src="cover_aiub.jpg" alt="Aiub" width="600" height="200">
    <h1>Welcome to AIUB Alumni Community </h1><br><br>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<?php   
  if(isset($error))  
  {  
    echo $error;  
  }  
?>
<table align="center" >  
<tr>
  <td>Post</td>
  <td>:</td> 
  <td><textarea name="poststat" rows="4" cols="50"></textarea></td>
  <td><span class="error">* <?php echo $poststatErr;?></span></td>
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
</form>
<h5><span class='label label-danger'>Recent Post:</span> </h5><br>
<?php
    $dtls = file_get_contents('aiub_com.json');
    $dtlsok = json_decode($dtls);

    foreach($dtlsok as $ok)
    {
        echo $ok->poststat."<br>";

    }
?>
    </fieldset>
</div>
</center>
</body>
</html>
<?php
    require("AMS_footer.php")
?>