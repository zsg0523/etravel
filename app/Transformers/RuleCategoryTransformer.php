<?php

/**
 * @Author: Eden
 * @Date:   2018-12-12 12:26:10
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-20 15:22:25
 */
namespace App\Transformers;

use App\Models\RuleCategory;
use League\Fractal\TransformerAbstract;

class RuleCategoryTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['rule'];

	public function transform(RuleCategory $rulecategory)
	{
		return [
			'id' => $rulecategory->id,
			'type' => $rulecategory->type,
			'rule_category_name' => $rulecategory->rule_category_name,
		];
	}

	public function includeRule(RuleCategory $rulecategory)
	{
		return $this->collection($rulecategory->rule, new RuleTransformer());
	}

}