<?php

/**
 * @Author: Eden
 * @Date:   2019-01-23 10:13:43
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-23 10:19:10
 */
namespace App\Transformers;

use App\Models\Evaluation;
use League\Fractal\TransformerAbstract;

class EvaluationTransformer extends TransformerAbstract
{
	public function transform(Evaluation $evaluation)
	{
		return [
			'id' => $evaluation->id,
			'evaluation_category_id' => $evaluation->evaluation_category_id,
			'content' => $evaluation->content,
			'type' => $evaluation->type,
		];
	}
}