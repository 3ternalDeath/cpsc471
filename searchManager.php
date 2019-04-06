<html>
	<style>		
		form {
			padding: 100px 20px;
			position: absolute;
			left: 600px;
			front-size: 30px;}		
			
		
	</style>
<body>
<div class="container">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<h1>modify search</h1><br/>
    Username :<input type="text" name="username"/><br/><br/>
   <input type="submit" value="search"/>
</form>
 </div>
 
 <?php
 include("adminPage.php");
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//echo"h";
	$userName = $_POST["username"];
	$admFlag=false;
	echo "<a href='register.php'>Need an account?</a>";

// Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
  {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "SELECT username From OverSeer  WHERE username LIKE '%$userName%' AND adminFlag='$admFlag'";
  $result = mysqli_query($con,$sql);
	
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<p align='center' style='color:blue'>".$row["username"]."</p>";
    }
} else {
    echo"<p align='center' style='color:red'>no match find</p>";
}

mysqli_close($con);}
?>
</body>
</html>