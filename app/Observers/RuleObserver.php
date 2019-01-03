<?php

/**
 * @Author: Eden
 * @Date:   2019-01-03 16:44:47
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-03 17:11:37
 */
namespace App\Observers;

use App\Models\Rule;
use App\Models\Group;
use App\Models\RuleCategory;
use App\Models\Examine;

class RuleObserver
{
	public function saved(Rule $rule)
	{
		// 判断当前 rule 是否属于行李清单 type= 30 且找出 travel_id
		$type      = RuleCategory::where('id', $rule->rule_category_id)->value('type');
		$travel_id = RuleCategory::where('id', $rule->rule_category_id)->value('travel_id');
		if ($type == 30) {
			// 找出属于该 travel_id 的所有用户
			$user_ids = Group::where('travel_id', $travel_id)->pluck('id')->toArray();
			// 为这些用户添加该行李清单所属关系
			foreach ($user_ids as $user_id) {
				$examine = array(
					'user_id' => $user_id,
					'rule_id' => $rule->id,
					'before' => 0,
					'after' => 0
				);
				Examine::insert($examine);
			}
		}
	}

}