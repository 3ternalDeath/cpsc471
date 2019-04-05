<html>
<title>Registration</title>	
	<style>
		form {
			padding-top: 80px;
			text-align: center;
			front-size: 30px;}
			
		label{
			position: absolute;
			left: 600px;
			}
			
		body {
			background-image: url("images.jpg");
		} 
	</style>
<body>
<div class="container">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<h1>User Registration</h1><br/>
	<label>Username :</label><br/>
    <input type="text" name="username"/><br/><br/>
	<label>Password :</label><br>
    <input type="password" name="password"/><br/><br/>
	<label>CCInfo :</label><br>
	<input type="text" name="CCInfo"/><br/><br/>
	<label>Age :</label><br>
	<input type="text" name="age"/><br/><br/>
	<label>Name :</label><br>
	<input type="text" name="name"/><br/><br/>
	<label>PhoneNumber :</label><br>
    <input type="text" name="phoneNumber"/><br/><br/>

   <input type="submit" value="create"/>
</form>
 </div>
 
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//echo"h";
	$userName = $_POST["username"];
	$passwd = $_POST["password"];
	$CCInfo = $_POST["CCInfo"];
	$age = $_POST["age"];
	$namee = $_POST["name"];
	$phoneNumber = $_POST["phoneNumber"];


// Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
  {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "INSERT INTO Customer (userName, passwd, CCInfo, age, namee, phoneNumber) VALUES ('". $userName ."','". $passwd ."','". $CCInfo ."','". $age ."','". $namee ."','". $phoneNumber ."')";

	if (!mysqli_query($con,$sql))
	{
		echo"<p align='center'>invalid username</p>";
	}
	else{
		header("Location:index.php");
		die();
	}

mysqli_close($con);}
?>
</body>
</html>