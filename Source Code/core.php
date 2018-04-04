<?php
	ob_start();
	session_start();
	$current_file = $_SERVER['SCRIPT_FILENAME'];//menampilkan page file yang sedang dibuka pada browser contoh : C:/xampp/htdocs/series/vid135/access.php
	
	
	if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER']))
	{
		$http_referer = $_SERVER['HTTP_REFERER'];
	}
	
	
	function loggedin()
	{
		if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function getfield($field)
	{
		global $conn;
		$user_id =  $_SESSION['user_id'];
		//echo $_SESSION['user_name'];
		$query = "SELECT ".mysqli_real_escape_string($conn,$field)." FROM register WHERE id = '".mysqli_real_escape_string($conn,$_SESSION['user_id'])."'";
		$query_run = mysqli_query($conn,$query);
		if($row = mysqli_fetch_assoc($query_run))
			return $row[$field];
		
	}
	
	


?>