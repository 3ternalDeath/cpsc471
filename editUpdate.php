<?php
	$tableName=$_POST['tableName'];
	$flag=true;
	
	$con=mysqli_connect("localhost","root","","cinemaDB");
	// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	if($tableName=="Movie"){
		$MovieIMDBID =  $_POST['MovieIMDBID'];	
		$name = $_POST["name"];
		$runTime = $_POST["runTime"];
		$producer = $_POST["producer"];
		$synopsis = $_POST["synopsis"];
		$director = $_POST["director"];
		$format = $_POST["format"];
		$releaseDate = $_POST["releaseDate"];
		$writer = $_POST["writer"];
		$returnLocation="searchMovie.php";
		if($name==""){$flag=false;}
		
		if($flag==true){
		$sql = "UPDATE Movie SET runTime='".$runTime."', name='".$name."', producer='".$producer."', synopsis='".$synopsis."', director='".$director."', format='".$format."' , releaseDate='".$releaseDate."', writer='".$writer."'WHERE IMDBID = '$MovieIMDBID'";
		if (!mysqli_query($con,$sql)){	  
			die('Error: ' . mysqli_error($con));
			}
		}
	}
	if($tableName=="OverSeer"){
		$holdername =  $_POST['holdername'];	
		$name = $_POST["name"];
		$phoneNumber = $_POST["phoneNumber"];
		$passwd = $_POST["password"];
		$returnLocation="searchManager.php";
		
		if($name=="" or $phoneNumber=="" or $passwd=="" or strlen($phoneNumber)<10){$flag=false;}
		
		if($flag==true){
		$sql = "UPDATE OverSeer SET passwd='".$passwd."', name='".$name."', phoneNumber='".$phoneNumber."' WHERE userName = '$holdername'";
		if (!mysqli_query($con,$sql)){	  
			die('Error: ' . mysqli_error($con));
			}
		}
	}
	if($tableName=="Customer"){}
	if($tableName=="ShowTime"){}
	

echo '<script language="javascript">';
if($flag==true){
echo 'alert("update successful")';}
else{echo 'alert("some of the values you entered is not valid, update deny")';}
echo '</script>';
header( "refresh:0;url=$returnLocation" );
	mysqli_close($con);
//}
 ?>