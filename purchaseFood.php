<?php

if(!isset ($_POST['foodId']))
	{$foodId =  $_POST['foodId'];}

 // Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
  {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sql="INSERT INTO Purchase (foodID, customer) VALUE ('". $foodId ."','". $_COOKIE["Cust_User"] ."')";
  if (!mysqli_query($con,$sql)){die();}
  else{
	  header("Location:customerAccount.php");
  }
  
  mysqli_close($con);
?>