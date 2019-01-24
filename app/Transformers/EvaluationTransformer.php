<?php

/**
 * @Author: Eden
 * @Date:   2019-01-23 10:13:43
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-23 18:30:44
 */
namespace App\Transformers;

use App\Models\Evaluation;
use League\Fractal\TransformerAbstract;

class EvaluationTransformer extends TransformerAbstract
{
	protected $user_id;

	public function __construct($user_id)
	{
		$this->user_id = $user_id;
	}

	public function transform(Evaluation $evaluation)
	{

		if ($evaluation->evaluate_users()->where('user_id', $this->user_id)->first()) {
			return [
				'id' => $evaluation->id,
				'evaluation_category_id' => $evaluation->evaluation_category_id,
				'content' => $evaluation->content,
				'type' => $evaluation->type,
				'answer' => $evaluation->evaluate_users()->where('user_id', $this->user_id)->first(),
			];
		} else {
			return [
				'id' => $evaluation->id,
				'evaluation_category_id' => $evaluation->evaluation_category_id,
				'content' => $evaluation->content,
				'type' => $evaluation->type,
				'answer' => [
					'option' => 0
				],
			];
		}

	}
}