<html>
<title>Registration</title>	
	<style>
		form {
			padding-top: 80px;
			text-align: center;
			front-size: 30px;}
			
		label{
			position: absolute;
			left: 600px;
			}
			
		body {
			background-image: url("images.jpg");
		} 
	</style>
<body>
<div class="container">
<form action="login.php" method="post">
	<h1>User Registration</h1><br>
	<label>Username :</label><br>
    <input type="text" name="username"><br><br>
	<label>Password :</label><br>
    <input type="password" name="password"><br><br>
	<label>CCInfo :</label><br>
	<input type="text" name="CCInfo"><br><br>
	<label>Age :</label><br>
	<input type="text" name="age"><br><br>
	<label>Name :</label><br>
	<input type="text" name="name"><br><br>
	<label>PhoneNumber :</label><br>
    <input type="text" name="phoneNumber"><br><br>

   <input type="submit" value="create">
</form>
 </div>
</body>
</html>