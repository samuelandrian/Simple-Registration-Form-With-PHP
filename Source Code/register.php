<?php
	require 'core.php';
	require 'file.php';
	if(!loggedin())
	{
		if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['repassword'])&&isset($_POST['firstname'])&&isset($_POST['surname']))
		{
			$username =  $_POST['username'];
			$password =  $_POST['password'];
			$repassword =  $_POST['repassword'];
			$firstname =  $_POST['firstname'];
			$surname =  $_POST['surname'];
			
			$password_hash = md5($password);
			
			if(!empty($username)&&!empty($password)&&!empty($repassword)&&!empty($firstname)&&!empty($surname))
			{
				if($password!=$repassword)
				{
					echo 'password not match';
				}
				else
				{
					//echo 'OK';
					
					//registration process
					$query = "SELECT username from REGISTER WHERE  username='$username'";
					$query_run = mysqli_query($conn,$query);	
					if(mysqli_num_rows($query_run)==1)
					{
						echo 'The username '.$username.' already exist';
					}
					else
					{
						//echo 'OK';
						$query = "INSERT INTO register (id,username,password,firstname,surname) VALUES ('NULL','".mysqli_real_escape_string($conn,$username)."','".mysqli_real_escape_string($conn,$password_hash)."','".mysqli_real_escape_string($conn,$firstname)."','".mysqli_real_escape_string($conn,$surname)."')";
						if($query_run = mysqli_query($conn,$query))
						{
							header('Location: register_success.php');
						}
						else
						{
							echo 'Sorry we couldnt register you this time';
						}
					}
					
					
					
				}
				
				
				//echo 'OK';
			}
			else
			{
				echo 'please fill all fiedls';
			}
		}
	}
	else
	{
		echo 'You\'re Registered and login';
	}

		 

?>
<form action="register.php" method="POST">

		Username : <br> <input type="text" maxlength="30" name = "username" value="<?php if(isset($username )){echo $username;}?>"> <br><br>	
		Password : <br> <input type="password" name="password"> <br><br>
		Re-enter Password : <br> <input type="password" name="repassword"> <br><br>
		First name :<br> <input type="text" maxlength="30" name="firstname" value="<?php if(isset($firstname)){echo $firstname;}?>"><br><br>
		Surname : <br> <input type="text" maxlength="30" name="surname" value="<?php if(isset($surname)){echo $surname;} ?>" > <br> <br>
		<input type="submit" value ="Register">

</form>
