<?php

use Illuminate\Database\Seeder;
use App\Models\Travel;
use App\Models\RuleCategory;
use App\Models\RuleCategoryTravel;

class RuleCategoryTravelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取 travel_ids
        $travel_ids = Travel::all()->pluck('id')->toArray();

        // 获取 rule_category_ids
        $rule_category_ids = RuleCategory::all()->pluck('id')->toArray();

        foreach ($travel_ids as $travel_id) {
        	foreach ($rule_category_ids as $rule_category_id) {
        		$map = array(
        			'travel_id' => $travel_id,
        			'rule_category_id' => $rule_category_id,
        		);
        		RuleCategoryTravel::insert($map);
        	}
        }
    }
}
