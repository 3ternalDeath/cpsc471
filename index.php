<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>	
	<style>
		form{padding-top: 120px;
			text-align: center;
			front-size: 30px;}
			
		input[type=text]{width: 200px;
			height: 40px;
			front-size: 30px;}
			
		input[type=password]{width: 200px;
			height: 40px;
			front-size: 30px;}
			
		input[name=login]{
			width: 150px;
			position: absolute;
			left: 530px;
			top: 354px;
			height: 20px;
			front-size: 15px;}		
			
		input[name=register]{
			width: 150px;
			position: absolute;
			left: 720px;
			top: 354px;
			height: 20px;
			front-size: 15px;}	
			
		body {
  background-image: url("images.jpg");
  
} 
			
	</style>
	
</head>
<body>

<form action="login.php" method="post">
	<h1>User Login Page</h1><br>
   Username: <input type="text" name="username"><br><br>
   Password: <input type="password" name="password"><br><br>

   <input type="submit" name= "login" value="login">
</form>

<form action="register.php" method="post">
    <input type="submit" name= "register" value="register" />
</form>

</body>
</html>
