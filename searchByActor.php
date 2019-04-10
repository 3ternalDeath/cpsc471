<?php
include("indexBase.php");
?>
<!DOCTYPE html>

<html>
<body>

<form method="get" action="searchByActor.php">
  Actor Name: <input type="text" name="Aname" value="<?php if(isset($_GET['Aname'])){echo $_GET['Aname'];}?>"><br>
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
  if(isset($_GET['Aname'])){
    $prep = mysqli_prepare($con,"SELECT IMDBID, name FROM Movie AS M WHERE EXISTS(SELECT * FROM Actor AS A, ActIn AS I WHERE I.movieIMDB = M.IMDBID AND I.actorIMDB = A.IMDBID AND A.name LIKE ?)");
    $aname = "%".$_GET['Aname']."%";
    mysqli_stmt_bind_param($prep, "s", $aname);
    mysqli_stmt_execute($prep);
    $result = mysqli_stmt_get_result($prep);
    $count = mysqli_num_rows($result);
    echo $count." actors found:";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      echo "<form method='get' action='searchByMovieName.php'>".$row['name']."  <input type='hidden' name='IMDB' value='".$row['IMDBID']."'><input type='submit'></form>";
    }
  }

}
?>

</body>
</html>

<?php
/*if(isset($_GET['Aname'])){
  $prep = mysqli_prepare($con,"SELECT IMDBID, name FROM Movie AS M WHERE EXISTS(SELECT * FROM Actor AS A, ActIn AS I WHERE I.movieIMDB = M.IMDBID AND I.actorIMDB = A.IMDBID AND A.name LIKE ?)");
  $aname = "%".$_GET['Aname']."%";
  mysqli_stmt_bind_param($prep, "s", $aname);
  mysqli_stmt_execute($prep);
  $result = mysqli_stmt_get_result($prep);
  $count = mysqli_num_rows($result);
  echo $count." results: ";
  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    echo "<form method='get' action='searchByCinema.php'>".$row['name']."  <input type='hidden' name='IMDB' value='".$row['IMDBID']."'><input type='submit'></form>";
  }
}*/
?>
