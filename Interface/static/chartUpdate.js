function chartUpdate(id) {
    myChart.data.datasets[0].data = timeY[id];
    myChart.data.labels = repsX[id]
    myChart.update();

    barChart.data.datasets[0].data = barData[id];
    barChart.data.labels = ['Hold 1', 'Hold 2', 'Hold 3']
    barChart.update();
}