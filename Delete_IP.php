<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
		$pid = $_REQUEST['pid'];
		$con->query("delete from in_patient where p_id='$pid'");
		 header("Location: IP.php");
	}
?>
<html>
<head>
<title>In Patients</title>
</head>
<body>
<h3 align="center">Enter Patient Details TO Delete</h3>
<form name="register" method="post" action="" >
 <!-- Not advised to use table within the form to enter user details -->
<table align="center" >
<tr>
<td>Patient ID</td>
<td><input type="text" name="pid" /></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="submit"></input>
</tr>
</table>
</form>
</body>
</html>