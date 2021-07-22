<html>
<head>
<title>Room Details</title>
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
<h3 align="center">Room Details</h3>
<?php
    $message="";
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM room");
        $row  = mysqli_num_rows($result);
		echo "<table>"; // start a table tag in the HTML
echo '<table border="3" align="center" cellspacing="2" cellpadding="2"> 
      <tr> 
          <th> <font face="Arial">ROOM-NO</font> </th> 
          <th> <font face="Arial">ROOM-TYPE</font> </th> 
          <th> <font face="Arial">STATUS</font> </th> 
          <th> <font face="Arial">PATIENT-ID</font> </th> 
          
      </tr>';
	  
	  if ($result = mysqli_query($con,"SELECT * FROM room")) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["room_no"];
        $field2name = $row["room_type"];
        $field3name = $row["status"];
        $field4name = $row["patient_id"];
        
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                   
              </tr>';
    }
	  }
?>
<input type="Submit" formaction="roomupdate.php" value="updateroom"/> &nbsp; &nbsp; &nbsp;<input type="Submit" formaction="details.php" value="Go Back"/>
</form>
</body>
</html>