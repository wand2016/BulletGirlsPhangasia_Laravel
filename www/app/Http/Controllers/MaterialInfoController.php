<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Libs\Library;

class MaterialInfoController extends Controller
{
    public function index(Request $request) {
        $category_list = Library::queryCategoryList();
        $subcategory_list = Library::querySubcategoryList();        
        $material_list = Library::queryMaterialList();
        
        return view('materials',
                    compact('category_list',
                            'subcategory_list',
                            'material_list'));
    }
    
    
}
