<html>
<head>
<title>In Patients</title>
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
<h1 align="center">LIST OF INPATIENTS</h1>
<?php
    $message="";
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM in_patient");
        $row  = mysqli_num_rows($result);
		echo "<table>"; // start a table tag in the HTML
echo '<table border="3" align="center" cellspacing="2" cellpadding="2"> 
      <tr> 
          <th> <font face="Arial">PATIENT-ID</font> </th> 
          <th> <font face="Arial">NAME</font> </th> 
          <th> <font face="Arial">GENDER</font> </th> 
          <th> <font face="Arial">ADDRESS</font> </th> 
          <th> <font face="Arial">ROOM_Number</font> </th> 
	  <th> <font face="Arial">DATE OF ADMISSION</font> </th> 
	  <th> <font face="Arial">DATE OF DISCHARGE</font> </th> 
	  <th> <font face="Arial">DOCTOR-ID</font> </th> 

      </tr>';
	  
	  if ($result = mysqli_query($con,"SELECT * FROM in_patient")) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["P_ID"];
        $field2name = $row["Name"];
        $field3name = $row["gender"];
        $field4name = $row["Address"];
        $field5name = $row["R_NUMBER"]; 
	$field6name = $row["DOA"]; 
	$field7name = $row["DOD"]; 
	$field8name = $row["Doc_ID"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
		  <td>'.$field6name.'</td> 
		  <td>'.$field7name.'</td> 
		  <td>'.$field8name.'</td>

              </tr>';
    }
	  }
?>
<input type="Submit" formaction="New_IP.php" value="Insert New Patient"/> &nbsp; &nbsp; &nbsp;<input type="Submit" formaction="details.php" value="Go Back"/> 
 <!--input type="Submit" formaction="Delete_IP.php" value="Delete Patient--"/>
<input type="Submit" formaction="details.php" value="Go Back"/> 
</form>
</body>
</html>