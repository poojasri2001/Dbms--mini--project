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
<h3 align="center">LAB-DETAILS</h3>
<?php
    $message="";
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM lab");
        $row  = mysqli_num_rows($result);
		echo "<table>"; // start a table tag in the HTML
echo '<table border="3" align="center" cellspacing="2" cellpadding="2"> 
      <tr> 
          <th> <font face="Arial">LAB-NO</font> </th> 
          <th> <font face="Arial">PATIENT-ID</font> </th> 
          <th> <font face="Arial">DOCTOR-ID</font> </th> 
          <th> <font face="Arial">LAB-DATE</font> </th> 
          
      </tr>';
	  
	  if ($result = mysqli_query($con,"SELECT * FROM lab")) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["lab_no"];
        $field2name = $row["P_id"];
        $field3name = $row["Doc_ID"];
        $field4name = $row["l_date"];
        
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                   
              </tr>';
    }
	  }
?>
<input type="Submit" formaction="lab_details.php" value="lab details"/>&nbsp;&nbsp;&nbsp;
<input type="Submit" formaction="lab_insert.php" value="Add lab details"/>&nbsp;&nbsp;&nbsp;<input type="Submit" formaction="details.php" value="Go Back"/>
</form>
</body>
</html>