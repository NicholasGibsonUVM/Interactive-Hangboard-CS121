<?php
$sqlSessions = 'SELECT `pmkSessionId` FROM `tblSession` WHERE `fpkUsername` = "' . $user_data[0]['pmkUsername'] . '" ORDER BY `pmkSessionId`';
$sessionList = $databaseWriter->select($sqlSessions);
$hangs = array();
$reps = array();
$counter = 0;
foreach ($sessionList as $sessionId) {
    $sqlSession = 'SELECT `fldTime`, `fldHold` FROM `tblHang` WHERE `fpkSessionId` = ' . $sessionId['pmkSessionId'];
    if (DEBUG) {
        print $databaseWriter->displayQuery($sqlSession);
    }
    $oneSession = $databaseWriter->select($sqlSession);
    $repCounter = 0;
    foreach ($oneSession as $hang) {
        $hangs[$counter][$repCounter] = $hang['fldTime'];
        $reps[$counter][$repCounter] = $repCounter + 1;
        $repCounter++;
    }
    $counter++;
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<section class="chartBox">
    <canvas id="myChart"></canvas>
</section>
<script>
    //setup block
    const timeY = <?php echo json_encode($hangs); ?> // goes in data
    const repsX = <?php echo json_encode($reps); ?> //goes in labels
    //data block
    const data = {
        labels: repsX[0],
        datasets: [{
            label: 'reps',
            data: timeY[0],
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
    const config = {
        type: 'line',
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