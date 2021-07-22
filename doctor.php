<html>
<head>
<title>DOCTOR</title>
</head>
<style>
body
{
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
<h1 align="center">LIST OF DOCTORS</h1>
<?php
    $message="";
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM doctor ORDER BY doctor_name");
        $row  = mysqli_num_rows($result);
		echo "<table>"; // start a table tag in the HTML
echo '<table border="3" align="center" cellspacing="2" cellpadding="2"> 
      <tr> 
          <th> <font face="Arial">DOCTOR_ID</font> </th> 
          <th> <font face="Arial">NAME</font> </th> 
          <th> <font face="Arial">DEPARTMENT</font> </th>  
      </tr>';
	  
	  if ($result = mysqli_query($con,"SELECT * FROM doctor order by doctor_name")) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["doctor_id"];
        $field2name = $row["doctor_name"];
        $field3name = $row["dept"];
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 

              </tr>';
    }
	  }
?>
<input type="Submit" formaction="New_doctor.php" value="Insert New doctor"/> &nbsp; &nbsp; &nbsp; <input type="Submit" formaction="Delete_doctor.php" value="Delete doctor"/>&nbsp;&nbsp;&nbsp;
<input type="Submit" formaction="details.php" value="Go Back"/> 
</form>
</body>
</html>