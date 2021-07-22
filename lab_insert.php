<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
		$lab_no = $_REQUEST['lab_no'];
		$pid = $_REQUEST['pid'];
		$did = $_REQUEST['did'];
		$date=$_REQUEST['date'];
		$con->query("insert into lab (lab_no,P_id,Doc_id,l_date) values ('$lab_no','$pid','$did','$date')");
		header("Location: lab.php");
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
<h3 align="center">Enter Lab Details</h3>
<form name="register" method="post" action="" >
<fieldset>
 <!-- Not advised to use table within the form to enter user details -->
<table align="center" >
<tr>
<td>LAB-NO</td>
<td><input type="text" name="lab_no" /></td>
</tr>
<tr>
<td>PATIENT-ID</td>
<td><input type="text" name="pid" /></td>
</tr>
<tr>
<td>DOCTOR-ID</td>
<td><input type="text" name="did" /></td>
</tr>
<tr>
<td>LAB-DATE</td>
<td><input type="date" name="date" /></td>
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