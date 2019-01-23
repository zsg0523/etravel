<?php

/**
 * @Author: Eden
 * @Date:   2019-01-22 17:10:31
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-23 12:50:58
 */
namespace App\Transformers;

use App\Models\EvaluationCategory;
use League\Fractal\TransformerAbstract;

class EvaCategoryTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['evaluations'];

	public function transform(EvaluationCategory $evaluation_category)
	{
		return [
			'id' => $evaluation_category->id,
			'travel_id' => $evaluation_category->travel_id,
			'title' => $evaluation_category->title,
		];
	}

	public function includeEvaluations(EvaluationCategory $evaluation_category)
	{
		if ($evaluation_category->evaluations) {
			return $this->collection($evaluation_category->evaluations, new EvaluationTransformer());
		}
	}


}
