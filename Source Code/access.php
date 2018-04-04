<?php
	require 'file.php';
	require 'core.php';
	
	//echo $current_file;
	
	
	//md5(pass123) = 32250170a0dca92d53ec9624f336ca24
	if(loggedin())
	{
		echo 'Your\'e loggin '.getfield('firstname').' '.getfield('surname');		
		echo '<br>';
		echo '<button href="logout.php"> <a href="logout.php"> Logout</a>  </button>';
		
		
	}
	else
	{
		include 'loginForm.php';
	}
?>
