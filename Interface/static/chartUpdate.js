function chartUpdate(id) {
    myChart.data.datasets[0].data = timeY[id];
    myChart.data.labels = repsX[id]
    myChart.update();
}