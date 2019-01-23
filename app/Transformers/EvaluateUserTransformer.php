<?php

/**
 * @Author: Eden
 * @Date:   2019-01-23 16:43:28
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-23 17:10:00
 */
namespace App\transformers;

use App\Models\EvaluateUser;
use League\Fractal\TransformerAbstract;

class EvaluateUserTransformer extends TransformerAbstract
{
	public function transform(EvaluateUser $evaluate_user)
	{
		return [
			'id' => $evaluate_user->id,
			'user_id' => $evaluate_user->user_id,
			'evaluation_id' => $evaluate_user->evaluation_id,
			'option' => $evaluate_user->option,
		];
	}






}