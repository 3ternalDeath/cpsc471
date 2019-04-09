<!DOCTYPE html>
<html>
<head>
	<title>Cinema</title>

	<style>
		body {background-image: url("images.jpg");}

		*{box-sizing: border-box;}

		.header, .footer{
			background-color: #364247;
			color: white;
			padding: 15px;
		}

		.topmenu{
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			position: -webkit-sticky;
			position: sticky;
			top: 0;
			background-color: #5bcfef;
		}

		.topmenu a, .dropbtn {
			float: left;
			display: inline-block;
			color: white;
			text-align: center;
			padding: 15px 25px;
			text-decoration: none;
		}

		.topmenu a:hover, .dropdown:hover .dropbtn {background-color: #3d97af}

		.active {background-color: #3d97af}


		.dropdown {
		  display: inline-block;
		}

		.dropdown-content {
		  display: none;
		  position: absolute;
		  background-color: #f9f9f9;
		  min-width: 160px;
		  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		  z-index: 1;
		}

		.dropdown-content a {
		  color: black;
		  padding: 12px 16px;
		  text-decoration: none;
		  display: block;
		  text-align: left;
		}

		.dropdown-content a:hover {background-color: #f1f1f1}

		.dropdown:hover .dropdown-content {
		  display: block;
		}


	</style>
</head>
<script>

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<body>

<div class="header">
	<h1>Fancy Cinema</h1><br>
</div>

	<div class="topmenu" id="myTopmenu">
		<a href="searchShowTime.php">Show Time</a>
		<div class="dropdown">
			<a href="javascript:void(0)" onclick="myFunction()" class="dropbtn">Movie</a>
			<div class="dropdown-content" id="myDropdown">
				<a href="searchByMovieName.php">Movie</a>
				<a href="searchByGenre.php">Genre</a>
				<a href="searchByActor.php">Actor</a>
			</div>
		</div>
		<a href="searchFood.php">Food</a>
		<li style="float:right"><a href="loginPage.php">Login as Customer</a></li>
		<li style="float:right"><a href="EmployeeLogin.php">Login as Employee</a></li>
</div>


<div>
	<h1>Tickets</h1>
	<label>Select Location :</label><br/>
    <input type="text" name="cinemaAddr"/><br/><br/>
	<label>Select Movie :</label><br/>
    <input type="text" name="name"/><br/><br/>
	<label>Select Date/Time :</label><br/>
	<input type="text" name="DTime"/><br/><br/>
	<input type="submit" value="search"/>
</div>


<div class="footer">
	<p>Hi, my name is cinema</p><br>
</div>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 //echo"h";
 $cinemaAddr = $_POST["cinemaAddr"];
 $name = $_POST["name"];
 $DTime = $_POST["DTime"];

// Create connection
 $con=mysqli_connect("localhost","root","","cinemaDB");

// Check connection
 if (mysqli_connect_errno($con))
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

///
 $sql = "SELECT cinemaAddr, DTime From ShowTime AND name From Movie";
 $result = mysqli_query($con,$sql);

 if (mysqli_num_rows($result) > 0) {
	 // output data of each row
 echo '<div style="
 width: 300px;
 height: 500px;
 background: rgba(236, 255, 179, 0.3);
 padding: 10px;
 margin: 20px;
 opacity: 1;
 position: absolute;
 top: 50px;
		 left: 800px;">';


 echo"<h1 style='font-size:150%; color: green;'>Display</h1>";
	 while($row = mysqli_fetch_assoc($result)) {
	 echo '<div style="padding: 20px 0px" >';
			 echo "<a href='editManager.php?holdername=".$row["username"]."'>".$row["username"]."</a>";
	 }
 }
else {
	 echo"<p align='center' style='color:red'>no match find</p>";
}

mysqli_close($con);}
?>


</body>
</html>
