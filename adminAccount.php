<html>
<body>
<img src="image2.gif" style="padding: 50px 20px;
							position: absolute;
							left: 300px;
							width:180px;
							height:200px;"> 
		

<div style="padding: 250px 20px;
			position: absolute;
			left: 700px;">
<form>
<input type="button" value="update account info" onclick="window.location.href='editAccount.php'" />
</form> 
</div>
</form>
</body>
</html>
 <?php
 include("adminPage.php");
// Create connection
	$con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql =  "SELECT namee, phoneNumber, manFlag FROM OverSeer WHERE userName = '$username'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   // $active = $row['active'];

	$count = mysqli_num_rows($result);
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
  if($count == 1){
	  //login as admin
	  echo '<div style="position:absolute; top:100px; left: 600px"> username:  '.$username.' </div>';
	  echo '<div style="position:absolute; top:130px; left: 600px"> name:  '.$row["namee"].' </div>';
	  echo '<div style="position:absolute; top:160px; left: 600px"> phoneNumber: '.$row["phoneNumber"].' </div>';
	  if( $row["manFlag"]==1){
		  echo '<div style="position:absolute; top:190px; left: 600px"> position: manager </div>';}
	  else{
		  echo '<div style="position:absolute; top:190px; left: 600px"> position: administration  </div>';}
    	  
	 }
 ?>