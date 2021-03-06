<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('write_title_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('travel_id')->unsigned()->index();
            $table->string('image')->nullable();
            $table->text('content');
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
        Schema::dropIfExists('writes');
    }
}
