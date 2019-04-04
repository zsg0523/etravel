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
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('flights', function (Blueprint $table) {
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('hotels', function (Blueprint $table) {
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('groups', function (Blueprint $table) {
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('rules', function (Blueprint $table) {
            $table->foreign('rule_category_id')->references('id')->on('rule_categories')->onDelete('cascade');
        });        
        Schema::table('routes', function (Blueprint $table) {
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('sceneries', function (Blueprint $table) {
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
        });
        Schema::table('foods', function (Blueprint $table) {
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
        });
        Schema::table('studies', function (Blueprint $table) {
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });
        Schema::table('evaluation_categories', function (Blueprint $table) {
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('locals', function (Blueprint $table) {
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('evaluation_user', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('evaluation_user', function (Blueprint $table) {
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');
        });
        Schema::table('evaluations', function (Blueprint $table) {
            $table->foreign('evaluation_category_id')->references('id')->on('evaluation_categories')->onDelete('cascade');
        });
        Schema::table('examines', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('examines', function (Blueprint $table) {
            $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');
        });
        Schema::table('school_user', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('school_user', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        });
        Schema::table('telephones', function (Blueprint $table) {
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('cascade');
        });
        Schema::table('writes', function (Blueprint $table) {
            $table->foreign('write_title_id')->references('id')->on('write_titles')->onDelete('cascade');
        });
        Schema::table('writes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
            $table->dropForeign(['travel_id']);
        });
        Schema::table('flights', function (Blueprint $table) {
            $table->dropForeign(['travel_id']);
        });
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropForeign(['travel_id']);
        });
        Schema::table('groups', function (Blueprint $table) {
            $table->dropForeign(['travel_id']);
        });
        Schema::table('routes', function (Blueprint $table) {
            $table->dropForeign(['travel_id']);
        });
        Schema::table('evaluation_categories', function (Blueprint $table) {
            $table->dropForeign(['travel_id']);
        });
        Schema::table('locals', function (Blueprint $table) {
            $table->dropForeign(['travel_id']);
        });
        Schema::table('rules', function (Blueprint $table) {
            $table->dropForeign(['rule_category_id']);
        });
        Schema::table('sceneries', function (Blueprint $table) {
            $table->dropForeign(['route_id']);
        });
        Schema::table('foods', function (Blueprint $table) {
            $table->dropForeign(['route_id']);
        });
        Schema::table('studies', function (Blueprint $table) {
            $table->dropForeign(['route_id']);
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['study_id']);
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('evaluation_user', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('evaluation_user', function (Blueprint $table) {
            $table->dropForeign(['evaluation_id']);
        });
        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropForeign(['evaluation_category_id']);
        });
        Schema::table('examines', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('examines', function (Blueprint $table) {
            $table->dropForeign(['rule_id']);
        });
        Schema::table('school_user', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('school_user', function (Blueprint $table) {
            $table->dropForeign(['school_id']);
        });
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['school_id']);
        });
        Schema::table('telephones', function (Blueprint $table) {
            $table->dropForeign(['travel_id']);
        });
        Schema::table('writes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('writes', function (Blueprint $table) {
            $table->dropForeign(['write_title_id']);
        });

































    }
}
