<html>
 <?php
 include("manPage.php");
 if($_GET){
        $IMDB= $_GET['IMDB'];     
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$IMDB= $_POST["IMDB"];
	$DTime = $_POST["DTime"];
	$price = $_POST["price"];
	$cinemaAddr = $_POST["cinemaAddr"];
	$roomNum = $_POST["roomNum"];
	
	// Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
  {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "INSERT INTO ShowTime (manUsr, IMDB, DTime, price,cinemaAddr , roomNum) VALUES ('". $username ."','". $IMDB ."','". $DTime ."','". $price ."' ,'".$cinemaAddr."','".$roomNum."')";

	if (!mysqli_query($con,$sql))
	{
		if($DTime==""){echo"<p align='center' style='color:red'>DTime field cannot be emplty</p>";}
		if($price==""){echo"<p align='center' style='color:red'>price field cannot be empty</p>";}
		die();
	}
	else{
		echo"<p align='center' style='color:blue'>creation success!</p>";
		header("Location:searchMovie.php");
		die();
	}

mysqli_close($con);}
?>
	<style>		
		form {
			padding: 60px 20px;
			position: absolute;
			left: 600px;
			front-size: 30px;}		
			
		
	</style>
<body>
<div class="container">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			
	<label>IMDB : <?php echo $IMDB;?></label><br/><br/>
	<label>Time: </label><br/>
    <input type="text" name="DTime" value="0000-00-00"/><br/><br/>
	<label>Price:</label><br/>
	<input type="text" name="price"/><br/><br/>
	<label>Cinema Address :</label><br/>
    <select name="cinemaAddr">
		<option value="Crowfoot Crossing">Crowfoot Crossing</option>
		<option value="Sunridge Spectrum">Sunridge Spectrum</option>
		<option value="East Hills">East Hills</option>
		<option value="Westhills">Westhills</option>
	</select> <br/><br/>
	<label>Room Number:</label><br/>
    <select name="roomNum">
		<option value="101">101</option>
		<option value="102">102</option>
		<option value="103">103</option>
		<option value="104">104</option>
	</select> <br/><br/>
	<input type="hidden" name="IMDB" value=<?php echo $IMDB;?>>
   <input type="submit" value="create"/>
</form>
 </div>
 </body>
</html>
