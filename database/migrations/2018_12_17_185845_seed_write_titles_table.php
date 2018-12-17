<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedWriteTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $titles = [
            [
                'title'        => '最大的得益',
                'created_at'   => date('Y-m-d',time())
            ],
            [
                'title'        => '最欣赏',
                'created_at'   => date('Y-m-d',time())
            ],
            [
                'title'        => '最大进步',
                'created_at'   => date('Y-m-d',time())
            ],
            [
                'title'        => '其他感想',
                'created_at'   => date('Y-m-d',time())
            ]
            
        ];

        DB::table('write_titles')->insert($titles);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
