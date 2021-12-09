<?php

	require 'core.php';
	require 'dbconnect.php';
	
	if(loggedin()){
		echo 'you are already registered and logged in';
	}else if(!loggedin()){
		if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['pass_again'])&&isset($_POST['firstname'])&&isset($_POST['surname']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$pass_again = $_POST['pass_again'];
			$firstname = $_POST['firstname'];
			$surname = $_POST['surname'];
			$pass_hash = md5($password);
			
			if(!empty($username)&&!empty($password)&&!empty($pass_again)&&!empty($firstname)&&!empty($surname))
			{
				if($password != $pass_again){
					echo 'passwords do not match';
				}
				else{
					
					$query = "SELECT `username` FROM `users3` WHERE `username`='$username'";
						if($query_run = mysqli_query($mycon,$query)){
							$num_rows = mysqli_num_rows($query_run);
							if($num_rows ==1){
								echo 'Username already exists!';
							}
							else if($num_rows==0)
							{
								$query = "INSERT INTO `users3`(`id`,`username`,`password`,`firstname`,`surname`) VALUES(NULL,'$username','$pass_hash','$firstname','$surname')";
									if($query_run = mysqli_query($mycon, $query)){
									
									header('Location: success.php');
									}
							}
						}
				}
			}else{
				echo 'all fields are required';
			}
			
			
		}
	
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("dark-night.jpg");

  min-height: 680px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>

<h2>Register Here</h2>
<div class="bg-img">
  
<h2>Sign Up :</h2>

<form action="register.php" method="POST" class="container">
	
	Username :<br> <input type="text" name="username" value="<?php if(isset($username)){echo $username;}?>"><br><br>
	Password :<br> <input type="password" name="password"><br><br>
	Re-enter Password :<br> <input type="password" name="password"><br><br>
	<!--Password again :<br> <input type="password" name="pass_again"><br><br>
	First Name :<br><input type="text" name="firstname" value="<?php if(isset($firstname)){echo $firstname;}?>"><br><br>
	surname :<br><input type="text" name="surname" value="<?php if(isset($surname)){echo $surname;}?>"><br><br> -->
	<input type="submit"  value="submit">

</form>
 </form>
</div>



</body>
</html>

<?php
	}
	 


?>