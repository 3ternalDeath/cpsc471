<!DOCTYPE html>

<html>
<head>
	<title>User Login</title>	
	<style>
		form{padding-top: 120px;
			text-align: center;
			front-size: 30px;}
			
		input[type=text]{width: 200px;
			height: 40px;
			front-size: 30px;}
			
		input[type=password]{width: 200px;
			height: 40px;
			front-size: 30px;}
			
		input[name=login]{
			width: 150px;
			position: absolute;
			left: 530px;
			top: 354px;
			height: 20px;
			front-size: 15px;}		
			
		a{
			width: 150px;
			position: absolute;
			left: 720px;
			top: 354px;
			height: 20px;
			front-size: 15px;}	
			
		body {
  background-image: url("images.jpg");
  
} 
			
	</style>
	
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<h1>User Login Page</h1><br/>
   Username: <input type="text" name="username"/><br/><br/>
   Password: <input type="password" name="password"/><br/><br/>

   <input type="submit" name= "login" value="login"/>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//echo "hi";
	
	$userName = $_POST["username"];
	$passwd = $_POST["password"];

// Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql =  "SELECT userName, passwd FROM Customer WHERE userName = '$userName' and passwd = '$passwd'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   // $active = $row['active'];

	$count = mysqli_num_rows($result);
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
  if($count == 1){
	  mysqli_close($con);
	  header("Location:index.php");
	  die();
	 }
  else{ 
	echo"<p align='center'>Your Login Name or Password is invalid</p>";
	mysqli_close($con);
  }
}
?>

<a href="register.php">Need an account?</a>

 </body>
</html>

