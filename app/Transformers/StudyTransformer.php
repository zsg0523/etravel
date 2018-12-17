<?php

/**
 * @Author: Eden
 * @Date:   2018-12-15 10:41:00
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-17 10:27:38
 */
namespace App\Transformers;

use App\Models\Study;
use League\Fractal\TransformerAbstract;

class StudyTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['questions'];

	public function transform(Study $study)
	{
		return [
			'id' => $study->id,
			'route_id' => $study->route_id,
			'title' => $study->title,
			'image' => $study->image,
			'body' => $study->body,
			'created_at' => $study->created_at->toDateTimeString(),
			'updated_at' => $study->updated_at->toDateTimeString()
		];
	}

	public function includeQuestions(Study $study)
	{
		return $this->collection($study->questions, new QuestionTransformer());
	}
}