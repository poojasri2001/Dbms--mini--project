<?php
    session_start();
    $message="";
    //if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','mysql1') or die('Unable To connect');
		//$pid = $_REQUEST['pid'];
	//$delete=mysql_query("ALTER TABLE room DROP patient_id where status='available'");
		$con->query("ALTER TABLE room DROP patient_id where status='available'");
		 header("Location: room.php");
	//}
?>