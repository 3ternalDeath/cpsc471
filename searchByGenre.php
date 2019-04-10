<?php
include("indexBase.php");
?>
<!DOCTYPE html>

<html>
<body>

<form method="get" action="searchByGenre.php">
  Genre Name: <input type="text" name="Gname" value="<?php if(isset($_GET['Gname'])){echo $_GET['Gname'];}?>"><br>
  <input type="submit" value="Search">
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
  if(isset($_GET['Gname'])){
    $prep = mysqli_prepare($con,"SELECT genre FROM Genre AS G WHERE G.genre LIKE ?");
    $gname = "%".$_GET['Gname']."%";
    mysqli_stmt_bind_param($prep, "s", $gname);
    mysqli_stmt_execute($prep);
    $result = mysqli_stmt_get_result($prep);
    $count = mysqli_num_rows($result);
    echo $count." genres found:";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      echo "<form method='get' action='searchByMovieName.php'>".$row['genre']."  <input type='hidden' name='Genre' value='".$row['genre']."'><input type='submit'></form>";
    }
  }

}
?>

</body>
</html>
