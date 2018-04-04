<?php
	
	if(isset($_POST['username'])&&isset($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$pass_hash = md5($password);
		if(!empty($username)&&!empty($password))
		{
			//echo 'OK';
			$query = "SELECT id,firstname from register WHERE username = '$username' AND password = '$pass_hash'";
			if($query_run = mysqli_query($conn,$query))
			{
				
				
				$query_num_rows = mysqli_num_rows($query_run);
				if($query_num_rows==0)
				{
					
					echo 'Invalid Username / Password combination';
				}
				else if($query_num_rows==1)
				{
					$row=mysqli_fetch_assoc($query_run);
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['user_name'] = $row['firstname'];
					//echo 'Youre Login'.$row['firstname'];
					header('Location: access.php');
				}
								
			}
			
			
		}else
		{
			echo 'you must enter usernama and password';
		}
	}


?>


<!-- di file acces php sudah ada file require :'core.php' -->
<form action="<?php echo basename($current_file) ?>" method="POST"> <!-- dibutuhkan base name untuk menghilangkan C:/xampp/htdocs/series/vid135/-->
Username : <input type="text" name="username">
Password : <input type="password" name="password"> <br>
<input type="submit" value="Log in">

<br><br>
didn't have any account ? <button > <a href="register.php"> Register </a> </button>


</form>