<!DOCTYPE html>

<html>
<head>
	<style>
		form{padding-top: 120px;
			text-align: center;
			front-size: 30px;}
			
		label{
			position: absolute;
			left: 600px;
			front-size: 30px;
			}
			
		input[name=login]{
			width: 150px;
			position: absolute;
			left: 530px;
			top: 354px;
			height: 20px;
			front-size: 15px;}		
			
		input[name=return]{
			width: 150px;
			position: absolute;
			left: 720px;
			top: 354px;
			height: 20px;
			front-size: 15px;}	
			
		p{position: absolute;
			left: 550px;
			top: 374px;}
			
		body {
  background-image: url("images.jpg");
  
} 
			
	</style>
	
</head>
<body>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<h1>Login As Employee</h1><br/>
	<label>Username :</label><br/>
	<input type="text" name="username"/><br/><br/>
	<label>Password :</label><br/>
	<input type="password" name="password"/><br/><br/>

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

	$sql =  "SELECT userName, passwd, adminFlag FROM OverSeer WHERE userName = '$userName' and passwd = '$passwd'";
	$result = mysqli_query($con,$sql);
	//$row = mysqli_fetch_assoc($result);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   // $active = $row['active'];

	$count = mysqli_num_rows($result);
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  if($count == 1){
	  session_start();
	  //login as admin
	  if( $row["adminFlag"]==1){		  
		$_SESSION['admName'] = $userName;
		header("Location:adminPage.php");
		die();
	  }
	  //else login as manager
	  else{
		  $_SESSION['admName'] = $userName;
		  header("Location:manPage.php");
		  die();
	  }
	 }
  else{ 
	echo"<p align='center' style='color:red'>Your Login Name or Password is invalid</p>";
  }

mysqli_close($con);
}
?>
<form action="index.php" method="post">
    <input type="submit" name= "return" value="return" />
</form>
 </body>
</html>

