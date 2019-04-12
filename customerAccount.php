<?php
if(!isset($_COOKIE["Cust_User"])) {
  header("Location:Forbidden.html");
  die();
}
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
  $prep = mysqli_prepare($con,"SELECT * FROM Ticket AS T, Movie AS M WHERE T.customer = ? AND M.IMDBID=T.IMDB AND T.DTime > ? ORDER BY T.DTime;");
  $curtime = date("Y-m-d H:i:s");
  mysqli_stmt_bind_param($prep, "ss", $_COOKIE["Cust_User"], $curtime);
  mysqli_stmt_execute($prep);
  $result = mysqli_stmt_get_result($prep);
  $count = mysqli_num_rows($result);
  if($count > 0){
    echo "<a>You have purchased ". $count." Tickets:</a>";
  }else{
    echo "<a>You do not have any tickets right now</a>";
  }
  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    echo "<p>";
    echo "Movie: ".$row['name']."<br>";
    echo "Location: ".$row['cinemaAddr']."<br>";
    echo "Date/Time: ".$row['DTime']."<br>";
    echo "Theater#: ".$row['roomNum']."<br>";
    $gets = http_build_query(array('IMDB'=>$row['IMDB'], 'Addr'=>$row['cinemaAddr'], 'room'=>$row['roomNum'], 'DTime'=>$row['DTime']));
    echo "<a href='removeTicket.php?".$gets."'> unbook ticket </a>";
    echo "</p><br>";
  }

  ?>

</body>
</html>
