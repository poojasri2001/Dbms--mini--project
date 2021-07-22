<!DOCTYPE html>
<html>
<style>
body, html {
  background-image:url("detail1.JPG");
  height: 100%;
  margin: 0;
}

.bgimg {
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: maroon;
  font-family: "Verdana", Courier, monospace;
  font-size: 35px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 25%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}

hr {
  margin: auto;
  width: 40%;
}
h1{
color:black;
}
</style>
<body>

<div class="bgimg">
  <div class="topleft">
  <!--img src="anna.png" alt="Italian Trulli" width="128" height="128"/-->
  </div>
  <div class="middle">
    <h1>"PH2 HOSPITAL"</h1>
	<form method="post">
	<input type="submit" formaction="doctor.php" value="DOCTORS"/><input type="submit" formaction="staff.php" value="STAFFS"/>
	<input type="Submit" formaction="IP.php" value="IN-PATIENT"/> <input type="Submit" formaction="OP.php" value="OUT-PATIENT"/> <input type="Submit" formaction="room.php" value="ROOMS"/> <input type="Submit" formaction="lab.php" value="LABS"/> 
	<input type="Submit" formaction="bill.php" value="BILL"/>	
	</form>
    <hr>
  </div>
  <div class="bottomleft">
    
  </div>
</div>

</body>
</html>
