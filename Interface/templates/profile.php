<?php 
session_start();
include("connection.php");
include("functions.php");
include "top.php";
$user_data = check_login($con);
?>

<body>

Hello, <?php echo $user_data['username']; ?>
	<!-- Tab links -->
	
	<div class="tab">
		<?php 
		$sqlSessions = 'SELECT pmkSessionId FROM tblSession WHERE fpkUsername = "' . $user_data['username'] . '"';
		print $sqlSessions;
		if(mysqli_query($con, $sqlSessions)){
			print('failed to connect');
		}
		$sessionList = mysqli_fetch_all($result);
		
// $statement1 = $pdo->prepare($sqlSessions);
		// $statement1->execute();

		// $sessionList = $statement1->fetchAll();
		// print $sessionList;
		
		foreach($sessionList as $sessionId){
			
			print '<button class="tablinks" onclick="openSession(event, Session' . $sessionId . ')"> Session ' . $sessionId . '</button>';
			print '</div>';

			print '<div id="session' . $sessionId . '" class="tabcontent">';
			print '<h3>Session ' . $sessionId . '</h3>';
			print '<table id="sessionData"><tr><th>Rep</th><th>Hold</th><th>Length</th></tr>';
			
			$sqlSession = 'SELECT pmkHangId, fldHold, fldTime FROM tblHang WHERE fpkSessionId = ' . $sessionId;
			print $sqlSession;
			$result = mysqli_query($con, $sqlSession);
			$oneSession = mysqli_fetch_all($result);
	
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
	<!-- <div class = 'container'>
		<button  onclick="window.location.href='addAscent.php';">Add Ascent</button>
	</div> -->
</body>
</html>