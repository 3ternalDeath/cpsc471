<?php
include("indexBase.php");
?>
<!DOCTYPE html>

<html>
<body>

<form method="get" action="searchByGenre.php">
<<<<<<< HEAD
  Genre Name: <input type="text" name="Gname" value="<?php if(isset($_GET['Gname'])){echo $_GET['Gname'];}?>">
=======
  Genre Name: <input type="text" name="Gname" value="<?php if(isset($_GET['Gname'])){echo $_GET['Gname'];}?>"><br>
<<<<<<< HEAD
>>>>>>> fc89e39f75e62f892d3811e2eb64608eac418cd3
=======
>>>>>>> fc89e39f75e62f892d3811e2eb64608eac418cd3
  <input type="submit" value="Search">
</form>

<?php
  // Create connection
  $con=mysqli_connect("localhost","root","","cinemaDB");

  // Check connection
  if (mysqli_connect_errno($con))
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $repget = "";
  if(isset($_GET['Gname'])){
    $repget = $_GET['Gname'];
  }
    $prep = mysqli_prepare($con,"SELECT genre FROM Genre AS G WHERE G.genre LIKE ?");
    $gname = "%".$repget."%";
    mysqli_stmt_bind_param($prep, "s", $gname);
    mysqli_stmt_execute($prep);
    $result = mysqli_stmt_get_result($prep);
    $count = mysqli_num_rows($result);
    if($repget == ""){
      echo $count." genres in total";
    }
    else{
      echo $count." genres found for ".$repget.":";
    }
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      echo "<form method='get' action='searchByMovieName.php'>".$row['genre']."  <input type='hidden' name='Genre' value='".$row['genre']."'><input type='submit' value='Select'></form>";
    }


?>

</body>
</html>
