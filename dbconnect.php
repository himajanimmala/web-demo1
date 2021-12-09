<?php

	$host= 'localhost';
	$user= 'root';
	$pass= '';
	$dbname= 'a_database';
	
	if($mycon =@mysqli_connect($host,$user,$pass)){
		if(!mysqli_select_db($mycon ,$dbname)){
			
			echo 'could not connect to the database';
			
			
		}
	}else{
		echo 'could not connect  the server!';
	}
	




?>