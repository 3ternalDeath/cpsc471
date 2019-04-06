<?php
session_start();
$username = $_SESSION['admName'];
?>
<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 20%;
  background-color: #f1f1f1;
  position: fixed;
  height: 97%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 15px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}

body { 

  background-image: url("images3.jpg");
  background-repeat: no-repeat;
  background-size: cover;
} 
</style>
</head>
<body>

<ul>
  <li><a class="active" href="adminAccount.php">Home</a></li>
  <li><a href="#Search Manager">Search Manager</a></li>
  <li><a href="addManager.php">Add Manager</a></li>
  <li><a href="#Search Movie">Search Movie</a></li>
  <li><a href="addMovie.php">Add Movie</a></li>
  <li><a href="editAccount.php">Manage Account</a></li>
  <li><a href="index.php">Logout</a></li>
</ul>

</body>
</html>