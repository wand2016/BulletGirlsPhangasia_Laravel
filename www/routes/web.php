<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

// ========================================
// マテリアル登録
// ========================================
// カテゴリ登録
Route::get('/register-material-category', 'MaterialRegistrationController@indexRegisterMaterialCategory');
Route::post('/register-material-category/post', 'MaterialRegistrationController@registerMaterialCategory');

// サブカテゴリ登録
Route::get('/register-material-subcategory', 'MaterialRegistrationController@indexRegisterMaterialSubcategory');
Route::post('/register-material-subcategory/post', 'MaterialRegistrationController@registerMaterialSubcategory');

// マテリアル登録
Route::get('/register-material', 'MaterialRegistrationController@indexRegisterMaterial');
Route::post('/register-material/post', 'MaterialRegistrationController@registerMaterial');


// ========================================
// マテリアル情報閲覧
// ========================================
Route::get('/materials', 'MaterialInfoController@index');


// ========================================
// データ追加
// ========================================
Route::get('/add-data', 'AddDataController@index');
Route::post('/add-data/post', 'AddDataController@addData');

// ========================================
// グラフ閲覧
// ========================================
Route::get('/graph/material-vs-mission', 'GraphController@indexMaterialVsMission');
Route::get('/graph/mission-vs-material', 'GraphController@indexMissionVsMaterial');

