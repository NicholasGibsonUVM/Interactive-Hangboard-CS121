<?php
include 'top.php';
session_start();
<<<<<<< HEAD
$user_data = check_login($con);
?>


<a href="logout.php">Logout</a>
<h1>This is the profile page</h1>

<br>
Hello, <?php echo $user_data['username']; ?>
=======
include("connection.php");
include("functions.php");
include "top.php";
$user_data = check_login($con);
?>

<body>
	<br>
	Hello, <?php echo $user_data['username']; ?>
>>>>>>> e94d1f499e41a7eb77349c4877db96cd6f75dade
</body>

</html>