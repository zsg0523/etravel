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
                'travel_id' => 1,
                'rule_category_name'        => '在机场',
                'type' => 10
            ],
            [
                'travel_id' => 1,
                'rule_category_name'        => '在飞机上',
                'type' => 10
            ],
            [
                'travel_id' => 1,
                'rule_category_name'        => '到达当地机场',
                'type' => 10
            ],
            [
                'travel_id' => 1,
                'rule_category_name'        => '一般事项',
                'type' => 10
            ],
            [
                'travel_id' => 1,
                'rule_category_name'        => '旅游安全',
                'type' => 10
            ],
            [
                'travel_id' => 1,
                'rule_category_name'        => '住宿地方',
                'type' => 10
            ],
            [
                'travel_id' => 1,
                'rule_category_name'        => '回程后离开香港机场',
                'type' => 10
            ],
            [
                'travel_id' => 1,
                'rule_category_name'        => '我的承诺',
                'type' => 20
            ],
            [
                'travel_id' => 1,
                'rule_category_name'        => '出发时穿着学校外套',
                'type' => 30
            ],
            [
                'travel_id' => 1,
                'rule_category_name'        => '衣物',
                'type' => 30
            ],
            [
                'travel_id' => 1,
                'rule_category_name'        => '卫生用品',
                'type' => 30
            ],
            [
                'travel_id' => 1,
                'rule_category_name'        => '其他物品',
                'type' => 30
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '在机场',
                'type' => 10
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '在飞机上',
                'type' => 10
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '到达当地机场',
                'type' => 10
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '一般事项',
                'type' => 10
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '旅游安全',
                'type' => 10
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '住宿地方',
                'type' => 10
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '回程后离开香港机场',
                'type' => 10
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '我的承诺',
                'type' => 20
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '出发时穿着学校外套',
                'type' => 30
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '衣物',
                'type' => 30
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '卫生用品',
                'type' => 30
            ],
            [
                'travel_id' => 2,
                'rule_category_name'        => '其他物品',
                'type' => 30
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
        DB::table('rule_categories')->truncate();
    }
}
