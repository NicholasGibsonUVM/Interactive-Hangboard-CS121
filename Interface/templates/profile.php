<?php
include 'top.php';
$user_data = check_login();
?>


<h1>This is the profile page</h1>

<br>
Hello, <?php echo $user_data[0]['pmkUsername']; ?>
</body>

</html>