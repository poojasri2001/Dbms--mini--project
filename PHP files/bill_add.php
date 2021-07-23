<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
		$no = $_REQUEST['no'];
		$pid = $_REQUEST['pid'];
		$med = $_REQUEST['med'];
		$room = $_REQUEST['room'];
		$days = $_REQUEST['days'];
		$con->query("insert into bill (bill_no,P_id,med_fee,room_fee,days) values ('$no','$pid','$med','$room','$days')");
		header("Location: bill.php");
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
<h3 align="center">Enter Bill Details</h3>
<form name="register" method="post" action="" >
<fieldset>
 <!-- Not advised to use table within the form to enter user details -->
<table align="center" >
<tr>
<td>BILL-NO</td>
<td><input type="text" name="no" /></td>
</tr>
<tr>
<td>PATIENT-ID</td>
<td><input type="text" name="pid" /></td>
</tr>
<tr>
<td>MEDICINE-CHARGE</td>
<td><input type="text" name="med" /></td>
</tr>
<tr>
<td>ROOM-CHARGE</td>
<td><input type="text" name="room" /></td>
</tr>
<tr>
<td>NO-OF-DAYS</td>
<td><input type="text" name="days" /></td>
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