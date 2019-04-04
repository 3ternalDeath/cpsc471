//create user account
<?php

$userName = $_POST["userName"];
$passwd = $_POST["passwd"];
$CCInfo = $_POST["CCInfo"];
$age = $_POST["age"];
$namee = $_POST["namee"];
$phoneNumber = $_POST["phoneNumber"];

echo $userName. "<br>";


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
  die('Error: ' . mysqli_error($con));
  }

echo "1 record added";

mysqli_close($con);
?>
