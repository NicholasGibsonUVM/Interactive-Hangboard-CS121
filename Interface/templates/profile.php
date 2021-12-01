<?php
include 'top.php';
$user_data = check_login();
?>


<h1>This is the profile page</h1>

<br>
Hello, <?php echo $user_data[0]['pmkUsername']; ?>

<button type ='button'>Start a new session</button>
<div class="tab">
		<?php 
		$sqlSessions = 'SELECT pmkSessionId FROM tblSession WHERE fpkUsername = "' . $user_data['username'] . '"';
		$sessionList = $databaseWriter->select($sqlSessions);
		
		foreach($sessionList as $sessionId){
			
			print '<button class="tablinks" onclick="openSession(event, Session' . $sessionId . ')"> Session ' . $sessionId . '</button>';
			print '</div>';

			print '<div id="session' . $sessionId . '" class="tabcontent">';
			print '<h3>Session ' . $sessionId . '</h3>';
			print '<table id="sessionData"><tr><th>Rep</th><th>Hold</th><th>Length</th></tr>';
			
			$sqlSession = 'SELECT pmkHangId, fldHold, fldTime FROM tblHang WHERE fpkSessionId = ' . $sessionId;
			$oneSession = $databaseWriter->select($sqlSession);
	
			foreach($oneSession as $hang){
				print '<tr>';
				print '<td>' . $hang['pmkHangId'] . '</td>';
				print '<td>' . $hang['fldHold'] . '</td>';
				print '<td> V' . $hang['fldTime'] . '</td>';
				print '</tr>' . PHP_EOL;
			}
		}
		?>
		</div>		
</body>

</html>