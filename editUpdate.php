<?php
// if (isset($_GET['holdername'])) {
	$holdername =  $_POST['holdername'];
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$name = $_POST["name"];
	$phoneNumber = $_POST["phoneNumber"];
	$passwd = $_POST["password"];
	
	$con=mysqli_connect("localhost","root","","cinemaDB");
	$flag=true;
	if($name=="" or $phoneNumber=="" or $passwd=="" or strlen($phoneNumber)<10){$flag=false;}

// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

//restore the original setting if the name is null	
	$sql = "UPDATE OverSeer SET passwd='".$passwd."', name='".$name."', phoneNumber='".$phoneNumber."' WHERE userName = '$holdername'";
	
	
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo '<script language="javascript">';
if($flag==true){
echo 'alert("update successful")';}
else{echo 'alert("some of the values you entered is not valid, update deny")';}
echo '</script>';
header( "refresh:0;url=searchManager.php" );
	mysqli_close($con);
//}
 ?>