<?php
include("indexBase.php");
?>

<div>
	<h1>Tickets</h1>
	<label>Select Location :</label><br/>
    <input type="text" name="cinemaAddr"/><br/><br/>
	<label>Select Movie :</label><br/>
    <input type="text" name="name"/><br/><br/>
	<label>Select Date/Time :</label><br/>
	<input type="text" name="DTime"/><br/><br/>
	<input type="submit" value="search"/>
</div>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 //echo"h";
 $cinemaAddr = $_POST["cinemaAddr"];
 $name = $_POST["name"];
 $DTime = $_POST["DTime"];

// Create connection
 $con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
 if (mysqli_connect_errno($con))
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

///
 $sql = "SELECT cinemaAddr, DTime From ShowTime AND name From Movie";
 $result = mysqli_query($con,$sql);


mysqli_close($con);}
?>
