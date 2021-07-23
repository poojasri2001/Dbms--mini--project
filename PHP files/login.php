<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
		$Username = $_REQUEST['user_name'];
		$Password = $_REQUEST['password'];
		$id=$_REQUEST['id'];
        $result = mysqli_query($con,"SELECT Password FROM credentials where Username='$Username' and Password='$Password' and a_id='$id'");
        $row  = mysqli_num_rows($result);
		if ($row == 1) {
            $_SESSION['username'] = $username;
            header("Location: Details.php");
        }
		else 
			{
             echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  </div>";
        }
	}
?>
<html>
<head>
<title>User Login</title>
</head>
<style>
body
{
background-image:url("login.JPG");
font-weight:bold;
background-color:purple;
}
fieldset{
width: 250px; margin: 2px auto;border:solid;
}
</style>
<body>
<form name="frmUser" method="post" action="" align="center">
<h3 align="center">Enter Login Details</h3>
<fieldset>
User-Id:<br>
<input type=:text" name="id">
<br>
 Username:<br>
 <input type="text" name="user_name">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Submit">
</fieldset>
</form>
</body>
</html>