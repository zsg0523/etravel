<?php

/**
 * @Author: Eden
 * @Date:   2018-12-12 12:19:46
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-03 23:37:52
 */
namespace App\Transformers;

use App\Models\Rule;
use League\Fractal\TransformerAbstract;

class RuleTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['examines', 'ruleCategory'];

	protected $user_id;

	public function __construct($user_id)
	{
		$this->user_id = $user_id;
	}

	public function transform(Rule $rule)
	{
		if (! $this->user_id) {
			return [
				'id' => $rule->id,
				'rule_category_id' => $rule->rule_category_id,
				'rule' => $rule->rule
			];
		} else {
			return [
				'id' => $rule->id,
				'rule_category_id' => $rule->rule_category_id,
				'rule' => $rule->rule,
				'examines' => $rule->examines()->where('user_id', $this->user_id)->get(),
			];
		}
		
	}

	public function includeExamines(Rule $rule)
	{
		return $this->collection($rule->examines, new ExamineTransformer());
	}

	public function includeRuleCategory(Rule $rule)
	{
		return $this->item($rule->ruleCategory, new RuleCategoryTransformer());
	}


}