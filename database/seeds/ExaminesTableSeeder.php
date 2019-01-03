<?php

use Illuminate\Database\Seeder;
use App\Models\Examine;
use App\Models\RuleCategory;
use App\Models\User;
use App\Models\Rule;

class ExaminesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取 user_ids
        $user_ids = User::all()->pluck('id')->toArray();

        // 获取行李清单分类
        $category_ids = RuleCategory::where('type', 30)->pluck('id')->toArray();

        // 获取 travel_ids
        $rule_ids = Rule::whereIn('rule_category_id', $category_ids)->pluck('id')->toArray();

        
        foreach ($user_ids as $user_id) {
            foreach ($rule_ids as $rule_id) {
                $examine = array(
                    'user_id' => $user_id,
                    'rule_id' => $rule_id,
                    'before' => 0,
                    'after' => 0
                );

                Examine::insert($examine);
            }
        }
	    
    }
}
