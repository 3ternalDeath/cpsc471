<!DOCTYPE html>
<html>
<head>
	<title>Cinema</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body {background-image: url("images.jpg");
					font-family:Arial}

		/*{box-sizing: border-box;}*/

		.header{
			background-color: #364247;
			color: white;
			padding: 15px;
		}

		.topnav{
			overflow: hidden;
			background-color: #5bcfef;
		}

		.topnav a {
			float: left;
			display: block;
			color: white;
			text-align: center;
			padding: 15px 25px;
			text-decoration: none;
			font-size: 17px;
		}

		.dropdown {
			float: left;
			overflow: hidden;
		}

		.dropdown .dropbtn {
			font-size: 17px;
		  cursor: pointer;
		  border: none;
			color: white;
		  outline: none;
		  padding: 15px 25px;
		  background-color: inherit;
			font-family: inherit;
		  margin: 0;
		}

		.topnav a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {background-color: #3d97af}

		.active {background-color: #3d97af}

		.dropdown-content {
		  display: none;
		  position: absolute;
		  background-color: #f9f9f9;
		  min-width: 160px;
		  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		  z-index: 1;
		}

		.dropdown-content a {
			float: none;
		  color: black;
		  padding: 15px 25px;
		  text-decoration: none;
		  display: block;
		  text-align: left;
		}

		.dropdown-content a:hover {background-color: #f1f1f1}

		.show {
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

<div class="topnav">
	<a href="searchShowTime.php">Show Time</a>
	<div class="dropdown">
		<button class="dropbtn" onclick="myFunction()">Movie
			<i class="fa fa-caret-down"></i></button>
		<div class="dropdown-content" id="myDropdown">
			<a href="searchByMovieName.php">Movie</a>
			<a href="searchByGenre.php">Genre</a>
			<a href="searchByActor.php">Actor</a>
		</div>
	</div>
	<a href="searchFood.php">Food</a>
	<a style="float:right" href="loginPage.php">Login as Customer</a>
	<a style="float:right" href="EmployeeLogin.php">Login as Employee</a>
</div>


</body>
</html>
