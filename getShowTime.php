<?php
include("indexBase.php");
if (isset($_GET['movieIMDBID'])) {
	$IMDBID =  $_GET['movieIMDBID'];
	$movieLoc=  $_GET['movieLoc'];
 }

// Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//get account detail
	$sql =  "SELECT * FROM Movie WHERE IMDBID = '$IMDBID'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$count = mysqli_num_rows($result);

 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

  
?>
<html>
<body>
<img src="<?php echo $row["image"];?>"style="padding: 30px 20px;
							position: absolute;
							left: 200px;
							width:320px;
							height:400px;">
</body>
</html>

<?php

	//get account detail
	$sql =  "SELECT * FROM ShowTime WHERE IMDB = '$IMDBID' AND cinemaAddr='$movieLoc'";
	$result = mysqli_query($con,$sql);

 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
  echo'<div style="position:absolute; top:250px; left: 600px">';
  
if(!isset($_COOKIE["Cust_User"])){
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	echo '<div style="padding: 20px 0px" >';
	echo "Date/Time  ".$row["DTime"]." ---> $".$row["price"]."---> Room Number".$row["roomNum"];
	}
	}
}
else{
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	echo '<div style="padding: 20px 0px" >';
	echo "<a href='userAccount.php?MovieIMDBID=".$row["IMDB"]." & DTime=".$row["DTime"]." & cinemaAddr=".$row["cinemaAddr"]."'>Date/Time ".$row["DTime"]." ---> $".$row["price"]."---> Room Number".$row["roomNum"]."</a>";
	}
	}
}
  
?>
