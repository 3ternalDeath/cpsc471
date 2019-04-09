<?php
 include("adminPage.php");
if (isset($_GET['MovieIMDBID'])) {
	$MovieIMDBID =  $_GET['MovieIMDBID'];
 }
 
// Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
//get account detail 
	$sql =  "SELECT * FROM Movie WHERE IMDBID = '$MovieIMDBID'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$count = mysqli_num_rows($result);
	
//if the account holder is manager, then include manPage.php (manager account setting)
//else display admin setting		
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

?>
<html>
<body>
<div class="container">
<form method="post" action="editUpdate.php">

<div style="padding: 30px 20px;
			position: absolute;
			left: 400px;
			front-size: 30px;">
			
	<label>IMDBID : <?php echo $MovieIMDBID;?></label><br/><br/>
	<label>Movie Name: </label><br/>
    <input type="text" name="name" value=<?php echo $row["name"];?>><br/><br/>
	<label>Run Time:</label><br/>
	<input type="text" name="runTime" value=<?php echo $row["runTime"];?>><br/><br/>
	<label>Producer :</label><br/>
    <input type="text" name="producer" value=<?php echo $row["producer"];?>><br/><br/>
	<label>Synopsis:</label><br/>
	<textarea name="synopsis" rows="5" cols="30" value=<?php echo $row["synopsis"];?>></textarea><br/><br/>
	<label>Director :</label><br/>
    <input type="text" name="director" value=<?php echo $row["director"];?>><br/><br/>
	</div>

	<div style="padding: 67px 20px;
			position: absolute;
			left: 600px;
			front-size: 30px;">
			
	<label>Format:</label><br/>
	<input type="text" name="format" value= <?php echo $row["FORMAT"];?>><br/><br/>
	<label>Release Date :</label><br/>
    <input type="date" name="releaseDate" value=<?php echo $row["releaseDate"];?>><br/><br/>
	<label>Writers :</label><br/>
    <input type="text" name="writer" value=<?php echo $row["writer"];?>><br/><br/>  
   </div>
		
	<input type="hidden" name="MovieIMDBID" value=<?php echo $MovieIMDBID;?>>
	<input type="hidden" name="tableName" value="Movie">
	
   <div style="padding: 300px 20px;
			position: absolute;
			left: 700px;">
   <input type="submit" value="update"/>
   </div>
</form>
 </div>
 

<div style="padding: 300px 20px;
			position: absolute;
			left: 800px;">

<form method="post" action="delete.php">
    <input type="hidden" name="holdername" value=<?php echo $MovieIMDBID;?>>
	 <input type="hidden" name="tableName" value="Movie">
	 <input type="hidden" name="columnName" value="IMDBID">
	 <input type="hidden" name="returnLocation" value="searchMovie.php">
    <input type="submit" value="delete">
</form>
</div>
 


 

</body>
</html>
