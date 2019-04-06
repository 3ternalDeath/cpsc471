 <?php
 //this page is used for editing account information for users
  //username is passed as parameter
session_start();
$username = $_SESSION['admName'];

// Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
//get account detail 
	$sql =  "SELECT name, phoneNumber, passwd, adminFlag FROM OverSeer WHERE userName = '$username'";
	
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$count = mysqli_num_rows($result);
	
//if the account holder is manager, then include manPage.php (manager account setting)
//else display admin setting	
	if( $row["adminFlag"]==0){
		  include("manPage.php");
		  }
	  else{
		  include("adminPage.php");
		  }
	
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
 
//update user account 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$phoneNumber = $_POST["phoneNumber"];
	$passwd = $_POST["password"];

//restore the original setting if the name is null	
	if($name==""){
		$name = $row["name"];
		$phoneNumber = $row["phoneNumber"];
		$passwd = $row["passwd"];
	}
	
	$sql = "UPDATE OverSeer SET passwd='".$passwd."', name='".$name."', phoneNumber='".$phoneNumber."' WHERE userName = '$username' ";
	
	 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

//update is successful  
  if($count == 1){
	  mysqli_close($con);
	  header("Location:adminAccount.php");
	  die();
	 }
	mysqli_close($con);

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
    <input type="text" name="name" value=<?php echo $row["name"];?>><br/><br/>
	<label>New Password :</label><br>
    <input type="password" name="password" value=<?php echo $row["passwd"];?>><br/><br/>
	<label>Update PhoneNumber :</label><br>
    <input type="text" name="phoneNumber" value=<?php echo $row["phoneNumber"];?>><br/><br/><br/>

   <input type="submit" value="update"/>
</form>
 </div>
 

</body>
</html>