<html>
<head>
<title>Lab Details</title>
</head>
<style>
body{
background-image:url("doctor1.JPG");
}
input[type="submit"]
{
background-color:black;
border:none;
color:white;
}
</style>
<body>
<form name="frmUser" method="post" action="" align="center">
<h3 align="center">BILL-DETAILS</h3>
<?php
    $message="";
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT bill_no,P_id,med_fee,room_fee,days FROM bill");
        $row  = mysqli_num_rows($result);
		echo "<table>"; // start a table tag in the HTML
echo '<table border="3" align="center" cellspacing="2" cellpadding="2"> 
      <tr> 
          <th> <font face="Arial">BILL-NO</font> </th> 
          <th> <font face="Arial">PATIENT-ID</font> </th> 
          <th> <font face="Arial">MEDICAL-CHARGE</font> </th> 
          <th> <font face="Arial">ROOM-CHARGE</font> </th> 
          <th> <font face="Arial">NO OF DAYS</font> </th> 
      </tr>';
	  
	  if ($result = mysqli_query($con,"SELECT * FROM bill")) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["bill_no"];
        $field2name = $row["P_id"];
        $field3name = $row["med_fee"];
        $field4name = $row["room_fee"];
        $field5name = $row["days"];
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
		  
              </tr>';
    }
	  }
?>
<input type="Submit" formaction="bill_add.php" value="Add Bill Details"/>&nbsp;&nbsp;&nbsp;<input type="submit" formaction="pay.php" value="PAYMENT"/>
&nbsp;&nbsp;&nbsp;<input type="submit" formaction="details.php" value="Go Back"/>
</form>
</body>
</html>