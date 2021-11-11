<?php 
include 'top.php';


session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where username = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pass'] === $password)
					{

						$_SESSION['id'] = $user_data['id'];
						header("Location: profile.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" 
          href="../style/forms_style.css?version=<?php print time();?>"
          type="text/css">
</head>
<body>
	<a href='login.php'><img src="../images/logo.png" class='navLogo' alt='logo'></a>
	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: lightgrey; text-align:center">Login</div>
			<label for="username" id="label">Username</label>
			<input id="text" type="text" name="username"><br><br>
			<label for="password" id="label">Password</label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">New User? Register</a><br><br>
		</form>
	</div>
</body>
</html>