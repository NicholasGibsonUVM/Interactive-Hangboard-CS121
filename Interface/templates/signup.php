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
			$query2 = "INSERT INTO `tblUser` (`username`, `pass`, `email`, `first`, `last`, `age`, `weight`, `years_climbing`, `Vgrade`, `leadGrade`) VALUES ('$username','$password','$email','$first','$last','$age','$weight','$yearsClimbing','$Vgrade','$leadGrade')";

			mysqli_query($con, $query2);
			
			echo 'Account added, go to login';
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
	<link rel="stylesheet" 
          href="../style/forms_style.css?version=<?php print time();?>"
          type="text/css">
</head>
<body>
	<a href='login.php'><img src="../images/logo.png" class='navLogo' alt='logo'></a>
	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: lightgrey;">Signup</div>

			<label for="first" id="label">First Name</label>
			<input id="text" type="text" name="first"><br><br>
			<label for="last" id="label">Last Name</label>
			<input id="text" type="text" name="last"><br><br>
			<label for="username" id="label">Username</label>
			<input id="text" type="text" name="username"><br><br>
			<label for="email" id="label">Email</label>
			<input id="text" type="email" name="email"><br><br>
			<label for="password" id="label">Password</label>
			<input id="text" type="password" name="password"><br><br>
			<label for="age" id="label">Age</label>
			<input id="text" type="text" name="age"><br><br>
			<label for="weight" id="label">Weight</label>
			<input id="text" type="text" name="weight"><br><br>
			<label for="yearsClimbing" id="label">Climbing Experience (Years)</label>
			<input id="text" type="text" name="yearsClimbing"><br><br>
			<label for="Vgrade" id="label">V-Grade</label>
			<input id="text" type="text" name="Vgrade"><br><br>
			<label for="leadGrade" id="label">Lead Grade</label>
			<input id="text" type="text" name="leadGrade"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>

		</form>
	</div>
</body>
</html>