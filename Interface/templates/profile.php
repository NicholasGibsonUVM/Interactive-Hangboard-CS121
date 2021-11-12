<?php 
session_start();
include("connection.php");
include("functions.php");
include "top.php";
$user_data = check_login($con);
?>

<body>
	<br>
	Hello, <?php echo $user_data['username']; ?>
</body>
</html>