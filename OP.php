<html>
<head>
<title>OUT Patients</title>
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
<h3 align="center">List of Out Patients</h3>
<?php
    $message="";
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM out_patient");
        $row  = mysqli_num_rows($result);
		echo "<table>"; // start a table tag in the HTML
echo '<table border="3" align="center" cellspacing="2" cellpadding="2"> 
      <tr> 
          <th> <font face="Arial">PATIENT-ID</font> </th> 
          <th> <font face="Arial">DATE</font> </th> 
          <th> <font face="Arial">NAME</font> </th> 
          <th> <font face="Arial">DOCTOR-ID</font> </th> 
      </tr>';
	  
	  if ($result = mysqli_query($con,"SELECT * FROM out_patient")) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["P_ID"];
        $field2name = $row["DATE"];
        $field3name = $row["name"];
	$field4name = $row["doc_id"];
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
              </tr>';
    }
	  }
?>
<input type="Submit" formaction="New_OP.php" value="Insert New Patient"/>&nbsp; &nbsp; &nbsp;<input type="Submit" formaction="details.php" value="Go Back"/>
</form>
</body>
</html>