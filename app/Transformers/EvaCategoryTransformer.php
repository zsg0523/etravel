<?php

/**
 * @Author: Eden
 * @Date:   2019-01-22 17:10:31
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-22 17:13:14
 */
namespace App\Transformers;

use App\Models\EvaluationCategory;
use League\Fractal\TransformerAbstract;

class EvaCategoryTransformer extends TransformerAbstract
{
	public function transform(EvaluationCategory $evaluation_category)
	{
		return [
			'id' => $evaluation_category->id,
			'travel_id' => $evaluation_category->travel_id,
			'title' => $evaluation_category->title,
		];
	}
}
