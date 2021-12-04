<?php
include 'top.php';
$user_data = check_login($dbUsername, $dbName);
?>

<h1>This is the profile page</h1>

<br>
Hello, <?php echo $user_data[0]['pmkUsername']; ?>
<form method='post' action='newSession.php'>
	<button class='session' type='submit'>Start a new session</button>
</form>
<section class="flexbox">
	<?php include('charts.php');?>
	<?php include('table.php'); ?>
</section>

<?php
print "<script>" . PHP_EOL;
include "../static/tableTabs.js";
print PHP_EOL . "</script>";
?>
</body>
</html>