<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('material-subcategories', function (Blueprint $table) {
                // 主キー
                $table->increments('id');
                // 所属カテゴリID
                $table->integer('category_id');
                // サブカテゴリ名
                $table->string('name');
                // 同じカテゴリ・同じマテリアル名の組を許さない
                $table->unique(['category_id', 'name']);
                // 時刻
                $table->timestamps();
                // IP情報用
                $table->integer('fingerprint');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('material-subcategories');        
    }
}
