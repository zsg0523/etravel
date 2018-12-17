<?php

/**
 * @Author: Eden
 * @Date:   2018-12-16 21:15:49
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-17 17:09:24
 */
namespace App\Transformers;

use App\Models\Question;
use League\Fractal\TransformerAbstract;

class QuestionTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['answers','study'];

	public function transform(Question $question)
	{
		return [
			'id' => $question->id,
			'study_id' => $question->study_id,
			'content' => $question->content
		];
	}

	public function includeAnswers(Question $question)
	{
		return $this->collection($question->answers, new AnswerTransformer());
	}

	public function includeStudy(Question $question)
	{
		return $this->item($question->study, new StudyTransformer());
	}
}