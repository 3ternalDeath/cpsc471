
<?php
include("indexBase.php");
if (isset($_GET['MovieIMDBID'])) {
	$MovieIMDBID =  $_GET['MovieIMDBID'];
	$MovieLoc= $_GET['Addr'];
	// Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$sql =  "SELECT image FROM Movie WHERE IMDBID= '$MovieIMDBID'";
	 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$count = mysqli_num_rows($result);
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

