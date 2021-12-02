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
<div class="tab">
	<?php
	$sqlSessions = 'SELECT `pmkSessionId` FROM `tblSession` WHERE `fpkUsername` = "' . $user_data[0]['pmkUsername'] . '" ORDER BY `pmkSessionId`';
	$sessionList = $databaseWriter->select($sqlSessions);
	if (DEBUG) {
		print_r($sessionList);
	}

	$counter = 1;
	foreach ($sessionList as $sessionId) {

		print '<button class="tablinks" onclick="openSession(event, \'Session' . $sessionId['pmkSessionId'] . '\')"> Session ' . $counter . '</button>' . PHP_EOL;
		$counter++;
	}

	$counter = 1;
	foreach ($sessionList as $sessionId) {
		print '<div id="Session' . $sessionId['pmkSessionId'] . '" class="tabcontent">' . PHP_EOL;
		print '<h3>Session ' . $counter . '</h3>' . PHP_EOL;
		print '<table id="sessionData">' . PHP_EOL . '<tr>' . PHP_EOL . '<th>Rep</th>' . PHP_EOL . '<th>Hold</th>' . PHP_EOL . '<th>Length</th>' . PHP_EOL . '</tr>';

		$sqlSession = 'SELECT `pmkHangId`, `fldHold`, `fldTime` FROM `tblHang` WHERE `fpkSessionId` = ' . $sessionId['pmkSessionId'];
		if (DEBUG) {
			print $databaseWriter->displayQuery($sqlSession);
		}
		$oneSession = $databaseWriter->select($sqlSession);
		$repCounter = 1;
		foreach ($oneSession as $hang) {
			print '<tr>';
			print '<td>' . $repCounter . '</td>';
			print '<td>' . $hang['fldHold'] . '</td>';
			print '<td>' . $hang['fldTime'] . '</td>';
			print '</tr>' . PHP_EOL;
			$repCounter++;
		}
		$counter++;
		print '</table>';
		print '</div>';
	}
	?>
</div>
<?php
print "<script>" . PHP_EOL;
include "../static/tableTabs.js";
print PHP_EOL . "</script>";
?>
</body>
</html>