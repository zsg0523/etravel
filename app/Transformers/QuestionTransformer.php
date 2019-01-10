<?php

/**
 * @Author: Eden
 * @Date:   2018-12-16 21:15:49
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-04 15:42:37
 */
namespace App\Transformers;

use App\Models\Question;
use League\Fractal\TransformerAbstract;

class QuestionTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['answers','study'];

	protected $user_id;

	public function __construct($user_id)
	{
		$this->user_id = $user_id;
	}

	public function transform(Question $question)
	{
		if ($answer = $question->answers()->where('user_id', $this->user_id)->first()) {
			return [
				'id' => $question->id,
				'study_id' => $question->study_id,
				'content' => $question->content,
				'is_answer' =>  true,
				'answer' => $answer
			];
		} else {
			return [
				'id' => $question->id,
				'study_id' => $question->study_id,
				'content' => $question->content,
				'is_answer' => false,
				'answer' => $answer
			];
		}
		
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