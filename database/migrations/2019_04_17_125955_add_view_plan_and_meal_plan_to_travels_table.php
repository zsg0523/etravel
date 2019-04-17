<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddViewPlanAndMealPlanToTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travels', function (Blueprint $table) {
            $table->text('view_plan')->nullable()->comment('景点安排');
            $table->text('meal_plan')->nullable()->comment('膳食安排');
            $table->text('urgency')->nullable()->change();
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
            $table->dropColumn('view_plan');
            $table->dropColumn('meal_plan');
        });
    }
}
