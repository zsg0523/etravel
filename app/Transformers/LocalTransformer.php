<?php

/**
 * @Author: Eden
 * @Date:   2019-01-22 11:46:11
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-23 11:12:14
 */
namespace App\Transformers;

use App\Models\Local;
use League\Fractal\TransformerAbstract;

class LocalTransformer extends TransformerAbstract
{
	public function transform(Local $local)
	{
		return [
			'culture'=>
			[
				'id' => $local->id,
				'title' => $local->title,
				'content' => $local->content,
			],
			'sites' => '泰国',
		];
	}


}
