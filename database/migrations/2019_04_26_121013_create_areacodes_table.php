<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreacodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areacodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('acname_en')->nullable()->commit('英文名');
            $table->string('acname_cn')->nullable()->commit('中文名');
            $table->string('codename')->nullable()->commit('代号');
            $table->integer('acnumber')->commit('区号');
            $table->integer('order_number')->commit('排序');
            $table->integer('show')->commit('是否显示');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areacodes');
    }
}
