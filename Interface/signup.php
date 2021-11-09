<?php 
session_start();

	include("connection.php");
	include("functions.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];
		$first = $_POST['first'];
		$last = $_POST['last'];
		$email = $_POST['email'];
		$yearsClimbing = $_POST['yearsClimbing'];
		$age = $_POST['age'];
		$weight = $_POST['weight'];
		$Vgrade = $_POST['Vgrade'];
		$leadGrade = $_POST['leadGrade'];


		if(!empty($username) && !empty($password) && !is_numeric($username))
		{
			//save to database
			$query2 = "INSERT INTO `users` (`username`, `pass`, `email`, `first`, `last`, `age`, `weight`, `years_climbing`, `Vgrade`, `leadGrade`) VALUES ('$username','$password','$email','$first','$last','$age','$weight','$yearsClimbing','$Vgrade','$leadGrade')";

			mysqli_query($con, $query2);
			
			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="first" placeholder="First Name"><br><br>
			<input id="text" type="text" name="last" placeholder="Last Name"><br><br>
			<input id="text" type="text" name="username" placeholder="Username"><br><br>
			<input id="text" type="email" name="email" placeholder="Email"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>
			<input id="text" type="text" name="age" placeholder="Age"><br><br>
			<input id="text" type="text" name="yearsClimbing" placeholder="Climbing experience (Years)"><br><br>
			<input id="text" type="text" name="weight" placeholder="Weight (lbs)"><br><br>
			<input id="text" type="text" name="Vgrade" placeholder="V-Grade"><br><br>
			<input id="text" type="text" name="leadGrade" placeholder="Lead Grade"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>