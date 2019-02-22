<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assemblies', function (Blueprint $table) {
            // 当 travel_id 对应的 travels 表数据被删除时，删除对应词条
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('flights', function (Blueprint $table) {
            // 当 travel_id 对应的 travels 表数据被删除时，删除对应词条
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('hotels', function (Blueprint $table) {
            // 当 travel_id 对应的 travels 表数据被删除时，删除对应词条
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('groups', function (Blueprint $table) {
            // 当 travel_id 对应的 travels 表数据被删除时，删除对应词条
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        
        Schema::table('rules', function (Blueprint $table) {
            // 当守则分类删除时删除相关守则
            $table->foreign('rule_category_id')->references('id')->on('rule_categories')->onDelete('cascade');
        });        
        Schema::table('routes', function (Blueprint $table) {
            // 当 travel_id 对应的 travels 表数据被删除时，删除对应词条
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('sceneries', function (Blueprint $table) {
            // 当 route_id 对应的 routes 表数据被删除时，删除对应词条
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
        });
        Schema::table('foods', function (Blueprint $table) {
            // 当 route_id 对应的 routes 表数据被删除时，删除对应词条
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
        });
        Schema::table('studies', function (Blueprint $table) {
            // 当 route_id 对应的 routes 表数据被删除时，删除对应词条
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
        });
        Schema::table('questions', function (Blueprint $table) {
            // 当 study_id 对应的 travels 表数据被删除时，删除对应词条
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });
        Schema::table('evaluation_categories', function (Blueprint $table) {
            // 当 travel_id 对应的 travels 表数据被删除时，删除对应词条
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('locals', function (Blueprint $table) {
            // 当 travel_id 对应的 travels 表数据被删除时，删除对应词条
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
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
            // 移除外键约束
            $table->dropForeign(['travel_id']);
        });
        Schema::table('flights', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['travel_id']);
        });
        Schema::table('hotels', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['travel_id']);
        });
        Schema::table('groups', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['travel_id']);
        });
        Schema::table('routes', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['travel_id']);
        });
        Schema::table('evaluation_categories', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['travel_id']);
        });
        Schema::table('locals', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['travel_id']);
        });
        Schema::table('rules', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['rule_category_id']);
        });
        Schema::table('sceneries', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['route_id']);
        });
        Schema::table('foods', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['route_id']);
        });
        Schema::table('studies', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['route_id']);
        });
        Schema::table('questions', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['study_id']);
        });

    }
}
