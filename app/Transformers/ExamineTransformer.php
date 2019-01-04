<?php

/**
 * @Author: Eden
 * @Date:   2018-12-18 15:21:29
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-04 12:04:17
 */
namespace App\Transformers;

use App\Models\Examine;
use League\Fractal\TransformerAbstract;

class ExamineTransformer extends TransformerAbstract
{
	public function transform(Examine $examine)
	{
		return [
			'id' => $examine->id,
			'after' => $examine->after,
			'before' => $examine->before,
			'created_at' => isset($examine->created_at) ? $examine->created_at->toDateTimeString() : '',
			'updated_at' => isset($examine->updated_at) ? $examine->updated_at->toDateTimeString() : ''
		];
	}
}