<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
		$did = $_REQUEST['did'];
		$con->query("delete from doctor where doctor_id='$did'");
		 header("Location: doctor.php");
	}
?>
<html>
<head>
<title>In Patients</title>
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
<h3 align="center">Enter Doctor ID  TO Delete</h3>
<form name="register" method="post" action="" >
 <!-- Not advised to use table within the form to enter user details -->
<fieldset>
<table align="center" >
<tr>
<td>DOCTOR_ ID</td>
<td><input type="text" name="did" /></td>
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