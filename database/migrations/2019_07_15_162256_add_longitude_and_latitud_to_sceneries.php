<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLongitudeAndLatitudToSceneries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sceneries', function (Blueprint $table) {
            $table->string('coordinate')->nullable()->after('description')->comment('经纬度');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sceneries', function (Blueprint $table) {
            $table->dropColumn('coordinate');
        });
    }
}
