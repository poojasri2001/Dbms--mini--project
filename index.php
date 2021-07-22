<!DOCTYPE html>
<html>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  background-image: url('Welcome.jpeg');
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
  background-color: blue;
  border: none;
  color: white;
  width: 300px;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
h2{
color:black;
}
hr {
  margin: auto;
  width: 40%;
}
</style>
<body>

<div class="bgimg">
  <div class="topleft">
  <!--img src="anna.png" alt="Italian Trulli" width="128" height="128"/-->
  </div>
  <div class="middle">
	<form method="post">
	<input type="Submit" formaction="login.php" value="ADMIN-LOGIN"/> 
	<!--input type="Submit" formaction="login.php" value="Doctor Login"/-->
	 <!--input type="Submit" formaction="login.php" value="Nurse Login"/--> 
	</form>
    <hr>
  </div>
  <div class="bottomleft">
    
  </div>
</div>

</body>
</html>
