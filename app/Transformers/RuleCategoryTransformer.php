<?php

/**
 * @Author: Eden
 * @Date:   2018-12-12 12:26:10
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-03 17:33:29
 */
namespace App\Transformers;

use App\Models\RuleCategory;
use League\Fractal\TransformerAbstract;

class RuleCategoryTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['rule'];

	protected $user_id;

	public function __construct($user_id) {
		$this->user_id = $user_id;
	}

	public function transform(RuleCategory $rulecategory)
	{
		return [
			'id' => $rulecategory->id,
			'travel_id' => $rulecategory->travel_id,
			'type' => $rulecategory->type,
			'rule_category_name' => $rulecategory->rule_category_name,
		];
	}

	public function includeRule(RuleCategory $rulecategory)
	{
		return $this->collection($rulecategory->rule, new RuleTransformer($this->user_id));
	}

}