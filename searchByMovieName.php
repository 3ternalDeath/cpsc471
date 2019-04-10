<?php
include("indexBase.php");
?>
<!DOCTYPE html>

<html>
<body>

<form method="get" action="searchByMovieName.php">
  Movie Name: <input type="text" name="Mname" value="<?php if(isset($_GET['Mname'])){echo $_GET['Mname'];}?>"><br>
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
  if(isset($_GET['Mname'])){
    $prep = mysqli_prepare($con,"SELECT IMDBID, name FROM Movie WHERE name LIKE ?");
    $mname = "%".$_GET['Mname']."%";
    mysqli_stmt_bind_param($prep, "s", $mname);
    mysqli_stmt_execute($prep);
    $result = mysqli_stmt_get_result($prep);
    $count = mysqli_num_rows($result);
    echo $count." results: ";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      echo "<form method='get' action='searchByCinema.php'>".$row['name']."  <input type='hidden' name='IMDB' value='".$row['IMDBID']."'><input type='submit'></form>";
    }
  }
  else if (isset($_GET['Addr'])){
    $prep = mysqli_prepare($con,"SELECT IMDBID, name FROM Movie as M WHERE EXISTS(SELECT * FROM PlayIn as P WHERE P.cinemaAddr = ? AND P.movieIMDB = M.IMDBID)");
    $pram = "".$_GET['Addr'];
    mysqli_stmt_bind_param($prep, "s", $pram);
    mysqli_stmt_execute($prep);
    $result = mysqli_stmt_get_result($prep);
    $count = mysqli_num_rows($result);
    echo $count." movies play at this location: ";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      echo "<form method='get' action='viewShowTimes.php'>".$row['name']."  <input type='hidden' name='IMDB' value='".$row['IMDBID']."'><input type='submit'></form>";
    }
  }
  else if(isset($_GET['Genre'])){
    $prep = mysqli_prepare($con,"SELECT IMDBID, name FROM Movie AS M WHERE EXISTS(SELECT * FROM Genre as G WHERE G.movieIMDB=M.IMDBID AND G.genre = ?)");
    $parm = "".$_GET['Genre'];
    mysqli_stmt_bind_param($prep, "s", $parm);
    mysqli_stmt_execute($prep);
    $result = mysqli_stmt_get_result($prep);
    $count = mysqli_num_rows($result);
    echo $count." movies have this genre: ";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      echo "<form method='get' action='searchByCinema.php'>".$row['name']."  <input type='hidden' name='IMDB' value='".$row['IMDBID']."'><input type='submit'></form>";
    }
  }

}
?>

</body>
</html>
