
<html>
<body>
<div class="container">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<div style="padding: 30px 20px;
			position: absolute;
			left: 400px;
			front-size: 30px;">
	<h1>Add Movie</h1>
	<label>IMDBID:</label><br/>
    <input type="int" name="IMDBID"/><br/><br/>
	<label>Movie Name :</label><br/>
    <input type="text" name="movieName"/><br/><br/>
	<label>Run Time:</label><br/>
	<input type="time" name="runTime" value="time"/><br/><br/>
	<label>Producer :</label><br/>
    <input type="text" name="producer"/><br/><br/>
	<label>Synopsis:</label><br/>
    <input type="text" name="synopsis" style="height:100px" /><br/><br/>
	<label>Director :</label><br/>
    <input type="text" name="director"/><br/><br/>
	
	</div>
	<div style="padding: 110px 20px;
			position: absolute;
			left: 700px;
			front-size: 30px;">
			
	<label>Format:</label><br>
	<input type="text" name="format"/><br/><br/>
	<label>Release Date :</label><br/>
    <input type="date" name="releaseDate" value= "date"/><br/><br/>
	<label>Writers :</label><br/>
    <input type="text" name="writer"/><br/><br/>
   
   </div>
   <div style="padding: 300px 20px;
			position: absolute;
			left: 800px;">
   <input type="submit" value="create"/>
   </div>
</form>
 </div>
 
 <?php
 include("adminPage.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//echo"h";
	$IMDBID = $_POST["IMDBID"];
	$name = $_POST["movieName"];
	$runTime = $_POST["runTime"];
	$producer = $_POST["producer"];
	$synopsis = $_POST["synopsis"];
	$director = $_POST["director"];
	$format = $_POST["format"];
	$releaseDate = $_POST["releaseDate"];
	$writer = $_POST["writer"];
	
// Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
  {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sql = "INSERT INTO Movie (addedBy, IMDBID, name, runTime, producer , synopsis, director, format, releaseDate, writer) 
  VALUES ('". $username ."','". $IMDBID ."','". $name ."','". $runTime ."' ,'". $producer ."','". $synopsis ."','". $director ."','".$format ."','".$releaseDate ."','". $writer."')";

	if (!mysqli_query($con,$sql))
	{
		if($IMDBID==""){echo"<p align='center' style='color:red'>IMDBID field cannot be emplty</p>";}
		if($name==""){echo"<p align='center' style='color:red'>name field cannot be empty</p>";}
		if($runTime==""){echo"<p align='center' style='color:red'>runTime field cannot be empty</p>";}
		if($releaseDate==""){echo"<p align='center' style='color:red'>releaseDater field cannot be empty</p>";}
		else{
		echo"<p align='center' style='color:red'>IMDBID is already registered</p>";}
		
		die();
	}
	else{
		echo"<p align='center' style='color:blue'>movie added!</p>";
		die();
	}

mysqli_close($con);}
?>
</body>
</html>