<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('material-categories', function (Blueprint $table) {
                // 主キー
                $table->increments('id');
                // 同じ名前のカテゴリを許さない
                $table->string('name')->unique();
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
        Schema::drop('material-categories');
    }
}
