<?php

use Illuminate\Database\Seeder;
use App\Models\Examine;
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

        // 获取 rule_ids
        $rule_ids = Rule::all()->pluck('id')->toArray();

        
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
