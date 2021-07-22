<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
		$no = $_REQUEST['no'];
		$status=$_REQUEST['status'];
		$id=$_REQUEST['id'];
		$con->query("UPDATE room set status='$status',patient_id='$id'  where room_no='$no'");
	$con->query("ALTER TABLE room DROP patient_id where status='available' and room_no='$no'");
		//$con->query("delete patient_id from room where status='available' and room_no='$no'");
		//$con->query("UPDATE room set status='available'  where room_no='$no' and status='non-available'");
		 header("Location: room.php");
	}
?>
<html>
<head>
<title>ROOM</title>
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
<h3 align="center">Enter room no and status TO Update</h3>
<form name="register" method="post" action="" >
<fieldset>
 <!-- Not advised to use table within the form to enter user details -->
<table align="center" >
<tr>
<td>ROOM-NO</td>
<td><input type="text" name="no" /></td>
</tr>
<tr>
<td>STATUS</td>
<td><input type="text" name="status"/></td>
</tr>
<tr>
<td>PATIENT-ID</td>
<td><input type="text" name="id"/></td>
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