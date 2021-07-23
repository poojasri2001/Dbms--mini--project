<html>
<head>
<title>STAFF DETAILS</title>
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
<h3 align="center">STAFF DETAILS</h3>
<?php
    $message="";
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM staff ");
        $row  = mysqli_num_rows($result);
		echo "<table>"; // start a table tag in the HTML
echo '<table border="3" align="center" cellspacing="2" cellpadding="2"> 
      <tr> 
          <th> <font face="Arial">STAFF-ID</font> </th> 
          <th> <font face="Arial">STAFF-NAME</font> </th> 
          <th> <font face="Arial">SALARY</font> </th> 
           
      </tr>';
	  
	  if ($result = mysqli_query($con,"SELECT * FROM staff ORDER BY s_name")) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["s_id"];
        $field2name = $row["s_name"];
        $field3name = $row["salary"];
         

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  
              </tr>';
    }
	  }
?>
<input type="Submit" formaction="new_staff.php" value="Insert New staff"/> &nbsp; &nbsp; &nbsp; <input type="Submit" formaction="Delete_staff.php" value="Delete staff"/>&nbsp; &nbsp; &nbsp;
<input type="Submit" formaction="details.php" value="Go Back"/> 
</form>
</body>
</html>