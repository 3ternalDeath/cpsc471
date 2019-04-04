<?php

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
	  echo "login susscee";}
  else{ 
 
	header("location:loginPage.php");
	echo"your Login Name or Password is invalid";
	die();
  }

mysqli_close($con);
?>