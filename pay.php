
<html>
<head>
<title>pay</title>
</head>
<style>
body
{
background-image:url("insert.JPG");
}
input[type="submit"]
{
background-color:black;
border:none;
color:white;
}
</style>
<body>
<center><h4>ENTER PATIENT-ID TO CALCULATE THE TOTAL AMOUNT</h4></center>
<form  method="post" action="payment.php ">
<table align="center">
<tr>
<td>PATIENT-ID</td>
<td><input type="text" name="id"/></td>
</tr>
<tr>
<td><center><input type="submit" value="submit"/></center></td>
</tr>
</table>
</form>
</body>
</html>