
<?php
	$sqlSessions = 'SELECT `pmkSessionId` FROM `tblSession` WHERE `fpkUsername` = "' . $user_data[0]['pmkUsername'] . '" ORDER BY `pmkSessionId`';
	$sessionList = $databaseWriter->select($sqlSessions);
	if (DEBUG) {
		print_r($sessionList);
	}

	$counter = 1;
	foreach ($sessionList as $sessionId) {
		$counter++;
	}

	$counter = 1;
	foreach ($sessionList as $sessionId) {
		$sqlSession = 'SELECT `fldTime` FROM `tblHang` WHERE `fpkSessionId` = ' . $sessionId['pmkSessionId'];
		if (DEBUG) {
			print $databaseWriter->displayQuery($sqlSession);
		}
		$oneSession = $databaseWriter->select($sqlSession);
		$repCounter = 1;
		$hangs = array();
        $reps = array();
		foreach ($oneSession as $hang) {
			$hangs[] = $hang['fldTime'];
            $reps[] = $repCounter;
			$repCounter++;
		}
		$counter++;
	}
	print_r($hangs);
    print_r($reps);
    print "<script>" . PHP_EOL;
include "../static/tableTabs.js";
print PHP_EOL . "</script>";
	?>
	?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<section class = "chartBox">
    //to try and display chart by clicking on session buttons
    <!-- <?php 
    foreach ($sessionList as $sessionId) {
		print '<canvas id="myChart" onclick="openSession(event, \'Session' . $sessionId['pmkSessionId'] . '></canvas>' . PHP_EOL;
		$counter++;
	}?> -->

//displaying chart as it is now
<canvas id="myChart"></canvas>
</section>
<script>
//setup block
const timeY = <?php echo json_encode($hangs); ?> // goes in data
const repsX = <?php echo json_encode($reps); ?> //goes in labels
//data block
const data ={
	labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'reps',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
	}
//config block
const config = {type: 'line',
    data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
}

//render block
const myChart = new Chart(
	document.getElementById('myChart'),
	config,
);

</script>