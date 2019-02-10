<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
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
        Schema::create('materials', function (Blueprint $table) {
                // 主キー
                $table->increments('id');
                // 所属サブカテゴリID
                $table->integer('subcategory_id');
                // マテリアル名
                $table->string('name');
                // 同じサブカテゴリ・同じマテリアル名の組を許さない
                $table->unique(['subcategory_id', 'name']);
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
        Schema::drop('materials');        
    }
}
