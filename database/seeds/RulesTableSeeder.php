<?php

use Illuminate\Database\Seeder;
use App\Models\Rule;
use App\Models\RuleCategory;

class RulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取所有分类 ID 数组
        $category_ids = RuleCategory::all()->pluck('id')->toArray();
        // 获取Faker实例
        $faker = app(Faker\Generator::class);

        $rules = factory(Rule::class)
        			->times(300)
        			->make()
        			->each(function ($rule,$index) 
        				use ($category_ids,$faker)
        			{
        				// 从分类的 ID 数组中随机取出一个数
        				$rule->rule_category_id = $faker->randomElement($category_ids);
        			});
        // 将数据集合转换为数组，并写入数据库
        Rule::insert($rules->toArray());
    }
}
