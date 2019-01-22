<?php

/**
 * @Author: Eden
 * @Date:   2018-12-17 10:51:00
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-17 16:19:56
 */
namespace App\Transformers;

use App\Models\Answer;
use League\Fractal\TransformerAbstract;

class AnswerTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['user','question'];

	public function transform(Answer $answer)
	{
		return [
			'id' => $answer->id,
			'user_id' => $answer->user_id,
			'question_id' => $answer->question_id,
			'content' => $answer->content,
			'created_at' => $answer->created_at->toDateTimeString(),
			'updated_at' => $answer->updated_at->toDateTimeString()
		];
	}

	public function includeUser(Answer $answer)
	{
		return $this->item($answer->user, new UserTransformer());
	}

	public function includeQuestion(Answer $answer)
	{
		return $this->item($answer->question, new QuestionTransformer());
	}

}