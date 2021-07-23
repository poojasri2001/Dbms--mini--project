<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
		$P_ID=$_REQUEST['P_ID'];
		$fullname = $_REQUEST['fullname'];
		$Gender = $_REQUEST['Gender'];
		$Address = $_REQUEST['Address'];
		$Room = $_REQUEST['room'];
		$doa = $_REQUEST['doa'];
		$dod = $_REQUEST['dod'];
		$doc_id = $_REQUEST['doc_id'];
		
		$con->query("insert into in_patient (P_ID,Name,gender,Address,R_NUMBER,DOA,DOD,Doc_ID) values ('$P_ID','$fullname','$Gender','$Address','$Room','$doa','$dod','$doc_id')");
		header("Location: IP.php");
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
max-width: 500px;
margin:auto;
padding: 10px;
}
</style>
<body>
<div class="content">
<h3 align="center">Enter Patient Details</h3>
<form name="register" method="post" action="" >
<fieldset>
 <!-- Not advised to use table within the form to enter user details -->
<table align="center" >
<tr>
<td>PATIENT-ID</td>
<td><input type="text" name="P_ID"/></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" name="fullname" /></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="text" name="Gender" /></td>
</tr>
<tr>
<td>Address</td>
<td><input type="text" name="Address" /></td>
</tr>
<tr>
<td>Room No</td>
<td><input type="text" name="room" /></td>
</tr>
<tr>
<td>Date Of Admit</td>
<td><input type="date" name="doa"  /></td>
</tr>
<tr>
<td>Date Of Discharge</td>
<td><input type="date" name="dod"  /></td>
</tr>
<tr>
<td>Doctor ID</td>
<td><input type="text" name="doc_id" /></td>
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