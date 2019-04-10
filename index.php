<?php
include("indexBase.php");
?>

<div>
	<h1>Tickets</h1>
	<label>Select Location :</label><br/>

		<select name="location">

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
// Create connection
$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
if (mysqli_connect_errno($con))
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(!isset($_GET['address'])){
 $sql = "SELECT address From Cinema";
 $result = mysqli_query($con,$sql);
 while($row = mysqli_fetch_array($result)){
	 echo "<form method='get'> ".$row['address']." <option value='".$row['address']."'> ".$row['address']." </option> </form>";
 }
}

mysqli_close($con);}
?>

	</select> <br/><br/>
</div>

<div>
	<label>Select Movie :</label><br/>
		<select name="movie">

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
// Create connection
 $con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
 if (mysqli_connect_errno($con))
 {
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 if(!isset($_GET['name'])){
	 $sql = "SELECT name From Movie";
	 $result = mysqli_query($con,$sql);
	 while($row = mysqli_fetch_array($result)){
		 echo "<form method='get'> ".$row['name']." <option value='".$row['name']."'> ".$row['name']." </option> </form>";
	 }
 }

mysqli_close($con);}
?>

</select> <br/><br/>
</div>

<div>
	<label>Select Date/Time :</label><br/>
		<select name="Date/Time">

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
// Create connection
 $con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
 if (mysqli_connect_errno($con))
 {
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 if(!isset($_GET['DTime'])){
	 $sql = "SELECT DTime From ShowTime";
	 $result = mysqli_query($con,$sql);
	 while($row = mysqli_fetch_array($result)){
		 echo "<form method='get'> ".$row['DTime']." <option value='".$row['DTime']."'> ".$row['DTime']." </option> </form>";
	 }
 }

mysqli_close($con);}
?>
</select> <br/><br/>
</div>

<div>
	<form method="get" action="index.php">
	  <input type="submit">
	</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
// Create connection
 $con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
 if (mysqli_connect_errno($con))
 {
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 if(!isset($_GET['price'])){
	 $sql = mysqli_prepare($con,"SELECT IMDBID FROM Movie AS M WHERE M.name = $name");
	 $result = mysqli_query($con,$sql);
	 while($row = mysqli_fetch_array($result)){
		 echo "<form method='get'> ".$row['IMDBID']." <option value='".$row['IMDBID']."'> ".$row['IMDBID']." </option> </form>";
	 }
 }

mysqli_close($con);}
?>

</div>
