<?php

/**
 * @Author: Eden
 * @Date:   2018-12-12 12:19:46
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-13 18:22:26
 */
namespace App\Transformers;

use App\Models\Rule;
use League\Fractal\TransformerAbstract;

class RuleTransformer extends TransformerAbstract
{
	public function transform(Rule $rule)
	{
		return [
			'id' => $rule->id,
			'rule' => $rule->rule
		];
	}

}