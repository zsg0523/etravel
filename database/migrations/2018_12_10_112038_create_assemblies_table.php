<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssembliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assemblies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('travel_id')->unsigned()->index();
            $table->string('leader')->index()->comment('领队老师');
            $table->string('duty')->nullable();
            $table->string('assembly_station')->comment('集合地点');
            $table->string('assembly_at');
            $table->string('dissolution_at');
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
        Schema::dropIfExists('assemblies');
    }
}
