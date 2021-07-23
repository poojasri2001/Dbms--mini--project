<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
	    $pid = $_REQUEST['patientid'];
	    $date = $_REQUEST['Date'];
	    $name=$_REQUEST['name'];
	    $id=$_REQUEST['id'];
		
		$con->query("insert into out_patient (P_ID ,DATE,name,doc_id) values ('$pid','$date','$name','$id')");
		header("Location: OP.php");
	}
?>
<html>
<head>
<title>out Patients</title>
</head>
<style>
body{
background-image:url("insert.JPG");
}
fieldset{
width: 300px; margin: 0px auto; border:solid;
}
.content{
max-width: 500px;
margin:auto;
padding: 10px;
}
</style>
<body>
<h3 align="center">Enter Patient Details</h3>
<div class="content">
<form name="register" method="post" action="" >
 <!-- Not advised to use table within the form to enter user details -->
<fieldset>
<table align="center" >
<tr>
<td>p_ID</td>
<td><input type="text" name="patientid" /></td>
</tr>
<tr>
<td>DATE</td>
<td><input type="date" name="Date" /></td>
</tr>
<tr>
<td>NAME</td>
<td><input type="text" name="name" /></td>
</tr>
<tr>
<td>DOCTOR-ID</td>
<td><input type="type" name="id" /></td>
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
</div>
</html>