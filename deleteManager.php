<?php

$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

//restore the original setting if the name is null	
	$holdername = $_POST['holdername'];
	
	$sql = "DELETE FROM OverSeer WHERE username='$holdername'";
	
	 if (!mysqli_query($con,$sql))
	{
		die('Error: ' . mysqli_error($con));
	}

echo '<script language="javascript">';
echo 'alert("delete successful")';
echo '</script>';
header( "refresh:0;url=searchManager.php" );
	mysqli_close($con);

?>