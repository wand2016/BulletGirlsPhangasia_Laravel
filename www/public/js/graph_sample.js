function drawBasic(elem_target) {

    var data = new google.visualization.DataTable();

    // 横軸
    data.addColumn('timeofday', 'マテリアル');
    // 第1縦軸
    data.addColumn('number', 'Motivation Level');

    data.addRows([
        [{v: [8, 0, 0]}, 100],
        [{v: [9, 0, 0], f: '9 am'}, 2],
        [{v: [10, 0, 0], f:'10 am'}, 3],
        [{v: [11, 0, 0], f: '11 am'}, 4],
        [{v: [12, 0, 0], f: '12 pm'}, 5],
        [{v: [13, 0, 0], f: '1 pm'}, 6],
        [{v: [14, 0, 0], f: '2 pm'}, 7],
        [{v: [15, 0, 0], f: '3 pm'}, 8],
        [{v: [16, 0, 0], f: '4 pm'}, 9],
        [{v: [17, 0, 0], f: '5 pm'}, 10],
    ]);

    var options = {
        title: 'グラフサンプル',
        hAxis: {
            title: 'Time of Day',
            format: 'h:mm a',
            viewWindow: {
                min: [7, 30, 0],
                max: [17, 30, 0]
            }
        },
        vAxis: {
            title: '入手率'
        }
    };

    var chart = new google.visualization.LineChart(elem_target);

    chart.draw(data, options);

    $('window').resize(function () {
        chart.draw(data, options);
    });
}
