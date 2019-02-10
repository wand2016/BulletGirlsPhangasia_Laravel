<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Libs\Library;

class MaterialRegistrationController extends Controller
{

    public function indexRegisterMaterialCategory(Request $request) {
        return view('register-material-category');
    }
    // サブカテゴリはカテゴリに対して登録する
    public function indexRegisterMaterialSubcategory(Request $request) {
        $category_list = Library::queryCategoryList();

        return view('register-material-subcategory',
                    compact('category_list'));
    }
    // マテリアルはサブカテゴリに対して登録する
    public function indexRegisterMaterial(Request $request) {
        $category_list = Library::queryCategoryList();
        $subcategory_list = Library::querySubcategoryList();

        return view('register-material',
                    compact('category_list',
                            'subcategory_list'));
    }


    public function registerMaterial(Request $request) {
        return Library::updateDBCommon(function (Request $request, $fingerprint) {
                $name = $request->get('name');
                $subcategory_id = $request->get('subcategory_id');
                
                DB::table('materials')
                    ->insertGetId([
                                   'name' => $name,
                                   'subcategory_id' => $subcategory_id,
                                   'fingerprint' => $fingerprint,
                                   ]);

                return 'マテリアル【' . $name . '】を追加しました。';
            }, $request);
    }

    public function registerMaterialSubcategory(Request $request) {
        return Library::updateDBCommon(function (Request $request, $fingerprint) {
                $name = $request->get('name');
                $category_id = $request->get('category_id');
                
                DB::table('material-subcategories')
                    ->insertGetId([
                                   'name' => $name,
                                   'category_id' => $category_id,
                                   'fingerprint' => $fingerprint,
                                   ]);

                return 'サブカテゴリ【' . $name . '】を追加しました。';
            }, $request);
    }    

    public function registerMaterialCategory(Request $request) {
        return Library::updateDBCommon(function (Request $request, $fingerprint) {
                $name = $request->get('name');
                DB::table('material-categories')
                    ->insertGetId([
                                   'name' => $name,
                                   'fingerprint' => $fingerprint,
                                   ]);

                return 'マテリアルのカテゴリ【' . $name . '】を追加しました。';
            }, $request);
    }
}
