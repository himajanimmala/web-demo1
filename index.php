<?php
require 'core.php';
require 'dbconnect.php';
	if(isset($_POST['username'])&&isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$pass_hash = md5($password);
		
		if(!empty($username)&&!empty($password)){
			
			$query = "SELECT `id` FROM `users3` WHERE `username`='$username' AND `password`='$pass_hash' ";
			if($query_run = mysqli_query($mycon, $query)){
				 $num_rows = mysqli_num_rows($query_run);
				if($num_rows == 0){
					echo 'invalid username or password !';
				}else if($num_rows == 1){
					
					$row = mysqli_fetch_row($query_run);
					  $id = $row[0];
					$_SESSION['user_id']=$id;
					header('Location: loginform.php');
				}
			}
			
			
		}else
		{
			echo 'please enter username or password';
		}
	}
	
/*
<form action="<?php echo $current_file ?>" method="POST">
		Username:<input type="text" name="username"><br><br>
		Password:<input type="password" name="password"><br><br>
		<p>Hai</p>
					<input type="submit" value="login">
</form>

*/

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
<script src="https://account.snatchbot.me/script.js"></script><script>window.sntchChat.Init(213588)</script>
</head>
<body>

<h2>LOGIN Here</h2>
<div class="bg-img">

<h2>Sign Up :</h2>

<form action="<?php echo $current_file ?>" method="POST" class="container">
		Username:<input type="text" name="username"><br><br>
		Password:<input type="password" name="password"><br><br>
					<input type="submit" value="login"><br><br>
					<?php

					$reg_txt = '<a href="register.php">Register Here</a>';
					echo $reg_txt;
					echo nl2br(" \n");
					$reg_txt1 = '<a href="register.php">Forgot Password</a>';
					echo $reg_txt1;

					?>

</form>
</div>



</body>
</html>
