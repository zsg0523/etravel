<?php

/**
 * @Author: Eden
 * @Date:   2018-12-12 12:26:10
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-06-18 12:38:10
 */
namespace App\Transformers;

use App\Models\RuleCategory;
use League\Fractal\TransformerAbstract;

class RuleCategoryTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['rules', 'travel'];

	protected $user_id;

	public function __construct($user_id)
	{
		$this->user_id = $user_id;
	}

	public function transform(RuleCategory $rulecategory)
	{
		return [
			'id' => $rulecategory->id,
			'type' => $rulecategory->type,
			'content' => $rulecategory->content,
			'rule_category_name' => $rulecategory->rule_category_name,
		];
	}

	public function includeRules(RuleCategory $rulecategory)
	{
		return $this->collection($rulecategory->rules, new RuleTransformer($this->user_id));
	}

	public function includeTravel(RuleCategory $rulecategory)
	{
		return $this->item($rulecategory->travel, new TravelTransformer());
	}

}