<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedRuleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'rule_category_name'        => '在机场',
            ],
            [
                'rule_category_name'        => '在飞机上',
            ],
            [
                'rule_category_name'        => '到达当地机场',
            ],
            [
                'rule_category_name'        => '一般事项',
            ],
            [
                'rule_category_name'        => '旅游安全',
            ],
            [
                'rule_category_name'        => '住宿地方',
            ],
            [
                'rule_category_name'        => '回程后离开香港机场',
            ]
        ];

        DB::table('rule_categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
