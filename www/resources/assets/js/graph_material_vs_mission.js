import GraphBase from './graph_base';


export default class GraphMaterialVsMission extends GraphBase {
    constructor (elem_target,
                 mission_number,
                 mission_difficulty,
                 material_list_raw,
                 material_lv_list,
                 graph_series_raw) {
        super(elem_target);

        this.missionNumber_ = mission_number;
        this.missionDifficulty_ = mission_difficulty;
        this.materialListRaw_ = material_list_raw;
        this.materialLvList_ = material_lv_list;
        this.graphSeriesRaw_ = graph_series_raw;
    }

    // override
    getRows_() {
        return getRows(
            this.materialListRaw_,
            this.getSeriesNameList_().length,
            this.graphSeriesRaw_);
    };

    // override
    getSeriesNameList_() {
        return this.materialLvList_.map(function (lv_number) {
            return 'Lv' + lv_number;
        });
    };
    
    // override
    getTitle_() {
        return 'M' + this.missionNumber_ + ' ' + this.missionDifficulty_ + ' 入手マテリアル';
    };
    // override
    getHTitle_() {
        return 'マテリアル';
    };
}


// 完全修飾名のマテリアルリストを得る
function getMaterialList (material_list_raw) {
    return  material_list_raw.map(function (material) {
        var fq_name = [
            material.category_name,
            material.subcategory_name,
            material.name].join('/');
        return {
            id: material.id,
            name: fq_name
        };
    });
}

function getRows (material_list_raw, series_num, graph_series_raw) {
    var material_list = getMaterialList(material_list_raw);
    
    var ret = material_list.map(function (material) {
        // 空のタプルをまず用意
        var ret = [material.name];
        for (var i = 0; i < series_num; ++i) {
            ret.push(0);
        }

        // データがある列を拾う
        var graph_series_raw_filtered = graph_series_raw.filter(function (graph_tuple) {
            return graph_tuple.material_id === material.id;
        });

        graph_series_raw_filtered.forEach(function (graph_tuple) {
            var material_lv = Number(graph_tuple.material_lv);
            var count = Number(graph_tuple.count);

            // 横軸分1つずらす
            var index = material_lv - 1 + 1;

            ret[index] = count;
        });
        
        return ret;
    });

    return ret;
}

window.GraphMaterialVsMission = GraphMaterialVsMission;
