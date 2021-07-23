<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
		$DOCTOR_ID = $_REQUEST['DOCTOR-ID'];
		$DOCTOR_NAME = $_REQUEST['DOCTOR-NAME'];
		$DEPARTMENT = $_REQUEST['DEPARTMENT'];
		$con->query("insert into doctor (doctor_id,doctor_name,dept) values ('$DOCTOR_ID','$DOCTOR_NAME','$DEPARTMENT')");
		header("Location: doctor.php");
	}
?>
<html>
<head>
<title>doctor</title>
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
<h3 align="center">Enter Doctor Details</h3>
<form name="register" method="post" action="" >
<fieldset>
 <!-- Not advised to use table within the form to enter user details -->
<table align="center" >
<tr>
<td>DOCTOR-ID</td>
<td><input type="text" name="DOCTOR-ID" /></td>
</tr>
<tr>
<td>DOCTOR-NAME</td>
<td><input type="text" name="DOCTOR-NAME" /></td>
</tr>
<tr>
<td>DEPARTMENT</td>
<td><input type="text" name="DEPARTMENT" /></td>
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