<?php

/**
 * @Author: Eden
 * @Date:   2018-12-16 21:15:49
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-16 21:18:20
 */
namespace App\Transformers;

use App\Models\Question;
use League\Fractal\TransformerAbstract;

class QuestionTransformer extends TransformerAbstract
{
	public function transform(Question $question)
	{
		return [
			'id' => $question->id,
			'study_id' => $question->study_id,
			'content' => $question->content
		];
	}
}