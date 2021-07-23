<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
		$sid = $_REQUEST['s_id'];
		$con->query("delete from staff where s_id='$sid'");
		 header("Location: staff.php");
	}
?>
<html>
<head>
<title>Staff</title>
</head>
<style>
body{
background-image:url("insert.JPG");
}
fieldset{
width: 300px; margin: 0px auto; border:solid;
}
.content{
max-width: 500px;height:1000px;
margin:auto;
padding: 10px;
}
</style>
<body>
<div class="content">
<h3 align="center">Enter Staff Id TO Delete</h3>
<form name="register" method="post" action="" >
<fieldset>
 <!-- Not advised to use table within the form to enter user details -->
<table align="center" >
<tr>
<td>Staff ID</td>
<td><input type="text" name="s_id" /></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="submit"></input>
</tr>
</table>
</fieldset>
</form>
</div>
</body>
</html>