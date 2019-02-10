import GraphBase from './graph_base';

export default class GraphMissionVsMaterial extends GraphBase {
    constructor (elem_target,
                 material_name,
                 material_lv,
                 mission_list,
                 difficulty_list,
                 graph_series_raw) {
        super(elem_target);

        this.materialName_ = material_name;
        this.materialLv_ = material_lv;
        this.missionList_ = mission_list;
        this.difficultyList_ = difficulty_list;
        this.graphSeriesRaw_ = graph_series_raw;
    }

    // override
    getRows_() {
        return getRows(this.missionList_,
                       this.getSeriesNameList_().length,
                       this.graphSeriesRaw_);
    };

    // override
    getSeriesNameList_() {
        return this.difficultyList_;
    };
    
    // override
    getTitle_() {
        return this.materialName_ + ' Lv' + this.materialLv_ + ' 入手ミッション';
    };
    // override
    getHTitle_() {
        return 'ミッション';
    };
    
};

function getRows (mission_list, series_num, graph_series_raw) {
    var ret = mission_list.map(function (mission) {
        // 空のタプルをまず用意
        var ret = ['M' + mission];
        for (var i = 0; i < series_num; ++i) {
            ret.push(0);
        }

        // データがある列を拾う
        var graph_series_raw_filtered = graph_series_raw.filter(function (graph_tuple) {
            return Number(graph_tuple.mission_number) === mission;
        });

        graph_series_raw_filtered.forEach(function (graph_tuple) {
            var difficulty = Number(graph_tuple.mission_difficulty);
            var count = Number(graph_tuple.count);

            // 横軸分1つずらす
            var index = difficulty + 1;

            ret[index] = count;
        });

        return ret;
    });

    return ret;
}

window.GraphMissionVsMaterial = GraphMissionVsMaterial;
