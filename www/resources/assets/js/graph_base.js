export default class GraphBase {
    constructor (elem_target) {
        this.chart_ = new google.visualization.LineChart(elem_target);
        this.registerEvents_();    
    }

    initialize () {
        this.data_ = this.getData_();
        this.options_ = this.getOptions_();
        this.redraw();
    };
    
    registerEvents_ () {
        $(window).resize(this.redraw.bind(this));
    };

    redraw () {
        this.chart_.draw(this.data_, this.options_);
    };

    getData_ () {
        var data = new google.visualization.DataTable();

        // 横軸
        data.addColumn('string', this.getHTitle_());

        // 縦軸
        this.getSeriesNameList_().forEach(function (series_name) {
            data.addColumn('number', series_name);
        });

        data.addRows(this.getRows_());

        return data;
    };

    getOptions_ () {
        return {
            title: this.getTitle_(),
            hAxis: {
                title: this.getHTitle_(),
            },
            vAxis: {
                title: '入手数',
                minValue: 0,
            },
            width: '100%',
            height: 400,
            legend: {position: 'bottom'},
        };
    };

    // abstract
    getRows_ () {
        return [];
    };

    // abstract
    getSeriesNameList_ () {
        return [];
    };
    
    // abstract
    getTitle_ () {
        return 'グラフタイトル';
    };
    // abstract
    getHTitle_ () {
        return '横軸ラベル';
    };
}
