<?php
	require 'core.php';
	require 'dbconnect.php';
	
	$logout_txt = '<a href="logout.php">Logout</a>'; 
	$wesite = '<a href="index.html">website</a>';

	if(loggedin()){
		$firstname = getuserfield('firstname');
		$surname = getuserfield('surname');
	
		echo '<br/>you are logged in and welcome    '.$firstname.' '.$surname.' '.$logout_txt;
		echo '<br/>visit our website  '.$wesite;
	}else{
		//include 'loginform.php';
	}
	header('Location: index.html');

?>
