 <?php
 include("adminPage.php");
// Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql =  "SELECT namee, phoneNumber, passwd FROM OverSeer WHERE userName = '$username'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$count = mysqli_num_rows($result);
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$namee = $_POST["name"];
	$phoneNumber = $_POST["phoneNumber"];
	$passwd = $_POST["password"];
	if($namee==""){
		$namee = $row["namee"];
		$phoneNumber = $row["phoneNumber"];
		$passwd = $row["passwd"];
	}
	
	$sql = "UPDATE OverSeer SET passwd='".$passwd."', namee='".$namee."', phoneNumber='".$phoneNumber."' WHERE userName = '$username' ";
	
	 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
  if($count == 1){
	  mysqli_close($con);
	  header("Location:adminAccount.php");
	  die();
	 }
  else{ 
	echo"<p align='center' style='color:red'>Your Login Name or Password is invalid</p>";
	mysqli_close($con);
  }
	}
?>
<html>
	<style>		
		form {
			padding: 80px 20px;
			position: absolute;
			left: 600px;
			front-size: 30px;}		
				
	</style>
<body>
<div class="container">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<h1><?php echo $username;?></h1><br/>
	<label>Update name: </label><br/>
    <input type="text" name="name" value=<?php echo $row["namee"];?>><br/><br/>
	<label>New Password :</label><br>
    <input type="password" name="password" value=<?php echo $row["passwd"];?>><br/><br/>
	<label>Update PhoneNumber :</label><br>
    <input type="text" name="phoneNumber" value=<?php echo $row["phoneNumber"];?>><br/><br/><br/>

   <input type="submit" value="update"/>
</form>
 </div>
 

</body>
</html>