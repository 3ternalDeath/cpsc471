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
	if (isset($_POST['columnName2'])) {
		$holdername2 = $_POST['holdername2'];
		$columnName2 = $_POST['columnName2'];
		$sql = "DELETE FROM $tableName WHERE $columnName='$holdername' AND $columnName2 = '$holdername2'";
	}
	else{
	$sql = "DELETE FROM $tableName WHERE $columnName='$holdername'";}
	
	 if (!mysqli_query($con,$sql))
	{
		echo '<script language="javascript">';
		echo 'alert("unsuccessful cannot find match")';
		echo '</script>';
		header( "refresh:0;url=$returnLocation" );
		die('Error: ' . mysqli_error($con));
	}
else{
	echo '<script language="javascript">';
	echo 'alert("delete successful")';
	echo '</script>';
	header( "refresh:0;url=$returnLocation" );}
	mysqli_close($con);

?>