<?php

/**
 * @Author: Eden
 * @Date:   2018-12-12 12:19:46
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-18 16:18:02
 */
namespace App\Transformers;

use App\Models\Rule;
use League\Fractal\TransformerAbstract;

class RuleTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['examines'];

	public function transform(Rule $rule)
	{
		return [
			'id' => $rule->id,
			'rule' => $rule->rule
		];
	}

	public function includeExamines(Rule $rule)
	{
		return $this->collection($rule->examines, new ExamineTransformer());
	}

}