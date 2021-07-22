<html>
<style>
body{
background-color:gray;
}
th{
width:500px;
}
</style>
<body>
<?php
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
	$PID=mysqli_real_escape_string($con,$_REQUEST['id']);
	echo "<center>";
	$sql="SELECT (med_fee+room_fee*days) AS total1 FROM bill where P_id='$PID' ";
	$result=$con->query($sql);
	if($result->num_rows>0)
	{
	echo "<table><tr><th>TOTAL AMOUNT TO PAY</th></tr></table>";
		while($row=$result->fetch_assoc())
		{
			echo "<tr>
			<td>" . $row["total1"]. "</td>
			</tr>";
		}
	echo "</table>";
	}
	echo "</center>";	
?>
</body>
</html>