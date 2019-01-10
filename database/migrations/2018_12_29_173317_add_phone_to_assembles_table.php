<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneToAssemblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assemblies', function (Blueprint $table) {
            $table->dropColumn('assembly_station');
            $table->dropColumn('assembly_at');
            $table->dropColumn('dissolution_at');
            $table->string('phone')->after('leader')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assemblies', function (Blueprint $table) {
            $table->string('assembly_station')->comment('集合地点');
            $table->string('assembly_at');
            $table->string('dissolution_at');
            $table->dropColumn('phone');
        });
    }
}
