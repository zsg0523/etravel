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
            $table->string('langitude')->nullable()->after('description')->comment('经度');
            $table->string('latitude')->nullable()->after('langitude')->comment('纬度');
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
            $table->dropColumn('langitude');
            $table->dropColumn('latitude');
        });
    }
}
