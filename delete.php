<?php

$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

//restore the original setting if the name is null	
	$holdername = $_POST['holdername'];
	$tableName = $_POST['tableName'];
	$returnLocation = $_POST['returnLocation'];
	$columnName = $_POST['columnName'];
	
	$sql = "DELETE FROM $tableName WHERE $columnName='$holdername'";
	
	 if (!mysqli_query($con,$sql))
	{
		die('Error: ' . mysqli_error($con));
	}

echo '<script language="javascript">';
echo 'alert("delete successful")';
echo '</script>';
header( "refresh:0;url=$returnLocation" );
	mysqli_close($con);

?>