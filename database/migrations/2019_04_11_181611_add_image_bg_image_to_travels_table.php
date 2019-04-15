<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageBgImageToTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travels', function (Blueprint $table) {
            $table->string('image')->nullable()->after('travel_name')->comment('背景图');
            $table->string('school_name')->nullable()->after('image')->comment('任意学校名称');
            $table->integer('travel_status')->default(10)->comment('出行状态,10/20/30...');
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
            $table->dropColumn('image');
            $table->dropColumn('school_name');
            $table->dropColumn('travel_status');
        });
    }
}
