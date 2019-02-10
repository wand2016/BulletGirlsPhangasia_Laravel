<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialDataTable extends Migration
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
        Schema::create('material-data', function (Blueprint $table) {
                // 主キー
                $table->increments('id');
                // ミッション番号
                $table->integer('mission_number');
                // 難易度
                $table->integer('mission_difficulty');
                // マテリアルID
                $table->integer('material_id');
                // マテリアルLv
                $table->integer('material_lv');                
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
        Schema::drop('material-data');
    }
}
