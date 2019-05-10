<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergencies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('travel_id')->unsigned()->nullable();
            $table->foreign('travel_id')->references('id')->on('travels');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->integer('code_one')->nullable()->commit('区号1');
            $table->integer('code_two')->nullable()->commit('区号2');
            $table->string('emergency_phone_one')->nullable()->commit('紧急联系人手机号码');
            $table->string('emergency_phone_two')->nullable()->commit('紧急联系人手机号码');
            $table->string('emergency_email_one')->nullable()->commit('紧急联系人邮箱地址');
            $table->string('emergency_email_two')->nullable()->commit('紧急联系人邮箱地址');
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
        Schema::dropIfExists('emergencies');
    }
}
