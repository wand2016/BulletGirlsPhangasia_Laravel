<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Libs\Library;

class AddDataController extends Controller
{
    public function index()
    {
        $category_list = Library::queryCategoryList();
        $subcategory_list = Library::querySubcategoryList();
        $material_list = Library::queryMaterialList();
        $difficulty_list = Library::getDifficultyList();
        $mission_list = Library::getMissionList();
        $material_lv_list = Library::getMaterialLvList();
        
        return view('add-data',
                    compact('category_list',
                            'subcategory_list',
                            'material_list',
                            'difficulty_list',
                            'mission_list',
                            'material_lv_list'));
    }

    public function addData(Request $request) {
        return Library::updateDBCommon(function (Request $request, $fingerprint) {
                $mission_number = $request->get('mission_number');
                $mission_difficulty = $request->get('mission_difficulty');
                $material_id = $request->get('material_id');
                $material_lv = $request->get('material_lv');
                $created_at = Carbon::now();
                
                $id = DB::table('material-data')
                    ->insertGetId(compact('mission_number',
                                          'mission_difficulty',
                                          'material_id',
                                          'material_lv',
                                          'fingerprint',
                                          'created_at'));

                return 'データを追加しました。(' . $id . ')';
            }, $request);
    }
}
