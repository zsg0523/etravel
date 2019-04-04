<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('travel_id')->unsigned()->index();
            $table->string('hotel_name')->index();
            $table->string('check_at')->nullable()->comment('入住日期');
            $table->string('leave_at')->nullable()->comment('离开日期');
            $table->string('times')->nullable()->comment('共几晚');
            $table->string('image')->nullable()->comment('酒店图片');
            $table->string('hotel_address')->comment('详细地址');
            $table->string('hotel_phone')->index();
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
        Schema::dropIfExists('hotels');
    }
}
