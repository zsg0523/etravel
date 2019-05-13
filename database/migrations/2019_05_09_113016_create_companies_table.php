<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->commit('公司名称');
            $table->integer('code_one')->nullable()->commit('区号1');
            $table->integer('code_two')->nullable()->commit('区号2');
            $table->string('emergency_phone_one')->nullable()->commit('紧急联系人手机号码');
            $table->string('emergency_phone_two')->nullable()->commit('紧急联系人手机号码');
            $table->string('emergency_email_one')->nullable()->commit('紧急联系人邮箱地址');
            $table->string('emergency_email_two')->nullable()->commit('紧急联系人邮箱地址');
            $table->integer('show')->nullable()->commit('是否显示');
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
        Schema::dropIfExists('companies');
    }
}
