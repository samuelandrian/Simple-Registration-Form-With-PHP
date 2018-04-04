<?php
	$conn_error = 'Could not connect';
	$conn_error1 = 'Could not connect';
	
	
	$host = 'localhost';
	$username1 = 'root';
	$password1 = 'samuel';
	
	$mysql_db = 'a_database';
	$table = 'users';
	
	//create connection
	$conn = mysqli_connect($host,$username1,$password1,$mysql_db);
	
	//checking connection 
	if(!$conn)
		die($conn_error);
	//echo 'connect succesfully <br>';
	

			
?>