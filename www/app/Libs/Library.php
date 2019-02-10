<?php

namespace App\Libs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Library
{
    public static function ipToFingerprint($ip) {
        // '.'区切りで分割して、整数にパース
        $splitted = explode('.', $ip);
        $number_list = array_map(function ($number_str) {
                return intval($number_str);
            }, $splitted);

        $byte_high = $number_list[0] xor $number_list[2];
        $byte_low  = $number_list[1] xor $number_list[3];

        return $byte_high << 8 | $byte_low;
    }

    // ----------------------------------------
    // DB書き込み共通
    // ----------------------------------------    
    public static function updateDBCommon(\Closure $proc, Request $request) {
        $fingerprint = Library::ipToFingerprint($request->ip());
        $message = '';
        $is_error = false;

        try {
            $message = $proc($request, $fingerprint);
        } catch (\PDOException $e) {
            var_dump($e->errorInfo);
            $message = $e->getMessage();
            $is_error = true;
        }

        return back()
            ->withInput()
            ->with([
                    'message'=> $message,
                    'is_error' => $is_error,
                    ]);

    }
    

    public static function queryCategoryList() {
        $category_list = DB::table('material-categories')
            ->select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();

        return $category_list;
    }

    public static function querySubcategoryList() {
        $subcategory_list = DB::table('material-subcategories')
            ->join('material-categories',
                   'material-subcategories.category_id',
                   '=',
                   'material-categories.id')
            ->select('material-categories.id as category_id',
                     'material-subcategories.id as id',
                     'material-subcategories.name as name')
            ->orderBy('subcategory_name', 'asc')            
            ->get();

        return $subcategory_list;
    }

    public static function queryMaterialList() {
        $material_list = DB::table('materials')
            ->join('material-subcategories',
                   'materials.subcategory_id',
                   '=',
                   'material-subcategories.id')
            ->select('material-subcategories.id as subcategory_id',
                     'materials.id as id',
                     'materials.name as name')
            ->orderBy('category_name', 'asc')
            ->orderBy('name', 'asc')

            ->get();

        return $material_list;
    }

    // 完全修飾
    public static function queryFqMaterialList() {
        $material_list = DB::table('materials')
            ->join('material-subcategories',
                   'materials.subcategory_id',
                   '=',
                   'material-subcategories.id')
            ->join('material-categories',
                   'material-subcategories.category_id',
                   '=',
                   'material-categories.id')
            ->select('material-subcategories.name as subcategory_name',
                     'material-categories.name as category_name',
                     'materials.name as name',
                     'materials.id as id')
            ->orderBy('category_name', 'asc')
            ->orderBy('subcategory_name', 'asc')            
            ->orderBy('name', 'asc')

            ->get();

        return $material_list;
    }
    


    public static function queryGraphDataByMission($mission_number, $mission_difficulty) {
        $material_count_series = DB::table('material-data')
            ->join('materials',
                   'material-data.material_id',
                   '=',
                   'materials.id')
            ->select('material_lv',
                     'materials.id as material_id',
                     DB::raw('count() as count'))
            // 該当ミッションのデータのみ抽出
            ->where('mission_number', '=', $mission_number)
            ->where('mission_difficulty', '=', $mission_difficulty)
            ->groupBy(DB::raw('material_id, material_lv'))
            ->get();

        return $material_count_series;
    }


    public static function queryGraphDataByMaterial($material_id, $material_lv) {
        $material_count_series = DB::table('material-data')
            ->join('materials',
                   'material-data.material_id',
                   '=',
                   'materials.id')
            ->select('mission_number',
                     'mission_difficulty',
                     DB::raw('count() as count'))
            // 該当マテリアルのデータのみ抽出
            ->where('material_id', '=', $material_id)
            ->where('material_lv', '=', $material_lv)
            ->groupBy(DB::raw('mission_number, mission_difficulty'))
            ->get();

        return $material_count_series;
    }

    public static function queryFqMaterialById($material_id) {
        $material = DB::table('materials')
            ->join('material-subcategories',
                   'materials.subcategory_id',
                   '=',
                   'material-subcategories.id')
            ->join('material-categories',
                   'material-subcategories.category_id',
                   '=',
                   'material-categories.id')
            ->select('material-subcategories.name as subcategory_name',
                     'material-categories.name as category_name',
                     'materials.name as name',
                     'materials.id as id',
                     'material-subcategories.id as subcategory_id',
                     'material-categories.id as category_id')
            ->where('materials.id', '=', $material_id)
            ->first();

        return $material;
    }

    public static function getDifficultyList() {
        return [
                'Normal',
                'Hard',
                'Ecstasy'
                ];
    }

    public static function getMissionList() {
        return range(1, 62);
    }

    public static function getMaterialLvList() {
        return range(1, 5);
    }
}
