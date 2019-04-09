<html>

<style>
  form{padding: 200px 20px;
  position: absolute;
  left: 50px;
  }
</style>

<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <h1>Food and Drink</h1>
</form>
</body>
</html>

<?php
include("indexBase.php");

  // Create connection
  	$con=mysqli_connect("localhost","root","","cinemaDB");

  // Check connection
  	if (mysqli_connect_errno($con))
    {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


  $sql = "SELECT name, type, price, size, description From Food";
  $result = mysqli_query($con,$sql);

  if (mysqli_num_rows($result) > 0) {

  echo '<div style="padding: 130px 20px; font-size:130%;">';
    while($row = mysqli_fetch_array($result))
  	echo "<a>".$row["name"]."---".$row["type"]."---".$row["size"]."---".$row["description"]."---".$row["price"]."</a>";
    

  }
  else {
    echo"<p align='center' style='color:red'>no match find</p>";
  }

mysqli_close($con);
?>
