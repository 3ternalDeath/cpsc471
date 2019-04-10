<?php
include("indexBase.php");
?>
<!DOCTYPE html>

<html>
<body>
<?php
  // Create connection
  $con=mysqli_connect("localhost","root","","cinemaDB");

  // Check connection
  if (mysqli_connect_errno($con))
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  if (isset($_GET['Addr']) && isset($_GET['IMDB'])){
    $prep = mysqli_prepare($con,"SELECT * FROM ShowTime as S WHERE ");
    $pram = "".$_GET['Addr'];
    mysqli_stmt_bind_param($prep, "s", $pram);
    mysqli_stmt_execute($prep);
    $result = mysqli_stmt_get_result($prep);
    $count = mysqli_num_rows($result);
    echo $count." movies play at this location: ";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      echo "<form method='get' action='viewShowTimes.php'>".$row['name']."  <input type='hidden' name='IMDB' value='".$row['IMDBID']."'><input type='hidden' name='Addr' value='".$_GET['Addr']."'><input type='submit' value='Select'></form>";
    }
  }else{
    echo "No clue what you are doing here... BEGONE!"

  }

?>

</body>
</html>
