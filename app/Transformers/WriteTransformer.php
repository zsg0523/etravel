<?php

/**
 * @Author: Eden
 * @Date:   2018-12-18 10:19:19
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-03-07 11:00:37
 */
namespace App\Transformers;

use App\Models\Write;
use League\Fractal\TransformerAbstract;

class WriteTransformer extends TransformerAbstract
{
	public function transform(Write $write)
	{
		return [
			'id' => $write->id,
			'write_title_id' => $write->write_title_id,
			'user_id' => $write->user_id,
			'travel_id' => $write->travel_id,
			'image' => $write->image,
			'content' => $write->content,
			'created_at' => $write->created_at->toDateTimeString(),
			'updated_at' => $write->updated_at->toDateTimeString()
		];
	}
}