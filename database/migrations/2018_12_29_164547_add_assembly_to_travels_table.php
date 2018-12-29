<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssemblyToTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travels', function (Blueprint $table) {
            $table->string('assembly_station')->after('travel_introduction')->nullable()->comment('集合地点');
            $table->string('assembly_at')->after('assembly_station')->nullable();
            $table->string('dissolution_station')->after('assembly_at')->nullable()->comment('解散地点');
            $table->string('dissolution_at')->after('dissolution_station')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travels', function (Blueprint $table) {
            $table->dropColumn('assembly_station');
            $table->dropColumn('assembly_at');
            $table->dropColumn('dissolution_station');
            $table->dropColumn('dissolution_at');
        });
    }
}
