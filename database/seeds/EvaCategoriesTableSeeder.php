<?php

use Illuminate\Database\Seeder;
use App\Models\Travel;
use App\Models\EvaluationCategory;

class EvaCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// 分类名称
        $category_names = ['请圈出自评', '请圈出心声', '请圈出反思'];

        // 获取 travel_ids
        $travel_ids = Travel::all()->pluck('id')->toArray();

        foreach ($travel_ids as $travel_id) {
        	foreach ($category_names as $category_name) {
        		$category = [
        			'travel_id' => $travel_id,
        			'title' => $category_name
        		];

        		EvaluationCategory::insert($category);
        	}
        }
    }
}
