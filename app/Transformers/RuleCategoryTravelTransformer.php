<?php

/**
 * @Author: Eden
 * @Date:   2019-01-16 12:37:05
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-16 16:23:55
 */
namespace App\Transformers;

use App\Models\RuleCategoryTravel;
use League\Fractal\TransformerAbstract;

class RuleCategoryTravelTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['rules', 'rule_category', 'travel'];
	protected $user_id;

	public function __construct($user_id) {
		$this->user_id = $user_id;
	}
	
	public function transform(RuleCategoryTravel $rulecategorytravel)
	{
		return [
			'id' => $rulecategorytravel->id,
			'travel_id' => $rulecategorytravel->travel_id,
			'rule_category_id' => $rulecategorytravel->rule_category_id
		];

	}

	public function includeRules(RuleCategoryTravel $rulecategorytravel)
	{
		return $this->collection($rulecategorytravel->rules, new RuleTransformer($this->user_id));
	}

	public function includeRuleCategory(RuleCategoryTravel $rulecategorytravel)
	{
		return $this->item($rulecategorytravel->rule_category, new RuleCategoryTransformer(null));
	}

	public function includeTravel(RuleCategoryTravel $rulecategorytravel)
	{
		return $this->item($rulecategorytravel->travel, new TravelTransformer());
	}

}