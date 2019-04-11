<?php
include("indexBase.php");
if (isset($_GET['movieIMDBID'])) {
	$IMDBID =  $_GET['movieIMDBID'];
	//$Loc=  $_GET['movieLoc'];
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
 $sql =  "SELECT cinemaAddr FROM PlayIn WHERE movieIMDB = '$IMDBID'";
  $result = mysqli_query($con,$sql);

	if (mysqli_num_rows($result) > 0) {
		echo '<div style="position:absolute; top:250px; left: 900px" > <b>Play In:</b> ';
		while($row = mysqli_fetch_assoc($result)) {
			echo '<div style="position:absolute; top:40px; left: 0px" >'.$row["cinemaAddr"].'';
		}
	}
	?>

