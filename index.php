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

		.topmenu li{float: left;}

		.topmenu li a, .dropbtn {
			display: inline-block;
			color: white;
			text-align: center;
			padding: 15px 25px;
			text-decoration: none;
		}

		.topmenu li a:hover, .dropdown:hover .dropbtn {background-color: #3d97af}

		.active {background-color: #3d97af}


		li.dropdown {
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


	</style></head>
<body>

<div class="header">
	<h1>Fancy Cinema</h1><br>
</div>

<div>
	<ul class="topmenu">
		<li><a href="searchShowTime.php" class="active">Show Time</a></li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">Movie</a>
			<div class="dropdown-content">
				<a href="searchByMovieName.php">Movie</a>
				<a href="searchByGenre.php">Genre</a>
				<a href="searchByActor.php">Actor</a>
			</div>
		</li>
		<li><a href="searchFood.php">Food</a></li>
		<li style="float:right"><a href="#login">Login</a></li>
	</ul>
</div>

<div>
	<a href="loginPage.php">Login as Customer<a>
	<a href="EmployeeLogin.php">Login as Employee</a>
	<a href="register.php">Need an account?</a>
</div>


<div class="container">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<div>
			<h1>Tickets</h1>
			<label>Select Location :</label><br/>
		    <input type="text" name="cinemaAddr"/><br/><br/>
			<label>Select Movie :</label><br/>
		    <input type="text" name="name"/><br/><br/>
			<label>Select Date/Time :</label><br/>
			<input type="text" name="DTime"/><br/><br/>
		</div>

</div>

<div class="footer">
	<p>Hi, my name is cinema</p><br>
</div>



</body>
</html>
