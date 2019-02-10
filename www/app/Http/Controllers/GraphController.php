<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Libs\Library;

class GraphController extends Controller
{
    public function indexMaterialVsMission(Request $request) {
        // TODO FormRequest
        // ミッション指定入力
        $mission_number = $request->get('mission_number', 1);
        $mission_difficulty =  $request->get('mission_difficulty', 0);

        // グラフ用
        $graph_series = Library::queryGraphDataByMission($mission_number, $mission_difficulty);
        $material_list = Library::queryFqMaterialList();
        $material_lv_list = Library::getMaterialLvList();

        // ミッション選択UI用
        $mission_list = Library::getMissionList();        
        $difficulty_list = Library::getDifficultyList();
        
        return view('graph-material-vs-mission',
                    compact('mission_number',
                            'mission_difficulty',
                            'graph_series',
                            'material_list',
                            'material_lv_list',
                            'mission_list',
                            'difficulty_list'));
    }
    
    public function indexMissionVsMaterial(Request $request) {
        // TODO FormRequest
        // マテリアル指定入力
        $material_id = $request->get('material_id', 1);
        $material_lv = $request->get('material_lv', 1);
        
        // グラフ用
        $graph_series = Library::queryGraphDataByMaterial($material_id, $material_lv);
        $fq_material = Library::queryFqMaterialById($material_id);
        $category_id = $fq_material->category_id;
        $subcategory_id = $fq_material->subcategory_id;


        $mission_list = Library::getMissionList();
        $difficulty_list = Library::getDifficultyList();

        // マテリアル選択UI用
        $category_list = Library::queryCategoryList();
        $subcategory_list = Library::querySubcategoryList();        
        $material_list = Library::queryMaterialList();
        $material_lv_list = Library::getMaterialLvList();
        
        return view('graph-mission-vs-material',
                    compact('material_id',
                            'subcategory_id',
                            'category_id',
                            'material_lv',
                            'graph_series',
                            'fq_material',
                            'mission_list',
                            'difficulty_list',
                            'category_list',
                            'subcategory_list',
                            'material_list',
                            'material_lv_list'));
    }
    
}
