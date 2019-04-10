<?php
include("indexBase.php");
?>
<!DOCTYPE html>

<html>
<body>

<form method="get" action="searchByMovieName.php">
  Movie Name: <input type="text" name="Mname" value="<?php if(isset($_GET['Mname'])){echo $_GET['Mname'];}?>"><br>
  <input type="submit" name="Search">
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
  // Create connection
  $con=mysqli_connect("localhost","root","","cinemaDB");

  // Check connection
  if (mysqli_connect_errno($con))
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  if(isset($_GET['Mname'])){
    $prep = mysqli_prepare($con,"SELECT IMDBID, name FROM Movie WHERE name LIKE ?");
    $mname = "%".$_GET['Mname']."%";
    mysqli_stmt_bind_param($prep, "s", $mname);
    mysqli_stmt_execute($prep);
    $result = mysqli_stmt_get_result($prep);
    $count = mysqli_num_rows($result);
    echo $count." results: ";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      echo "<a href='searchByMovieName.php'>Movie</a>";
    }
  }

}
?>

</body>
</html>
