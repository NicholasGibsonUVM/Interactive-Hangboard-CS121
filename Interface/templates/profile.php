<?php
include 'top.php';
session_start();
$user_data = check_login($con);
?>


<a href="logout.php">Logout</a>
<h1>This is the profile page</h1>

<br>
Hello, <?php echo $user_data['username']; ?>
</body>

</html>