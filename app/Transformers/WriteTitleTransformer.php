<?php

/**
 * @Author: Eden
 * @Date:   2018-12-17 18:18:12
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-17 21:42:54
 */
namespace App\Transformers;

use App\Models\WriteTitle;
use League\Fractal\TransformerAbstract;

class WriteTitleTransformer extends TransformerAbstract
{
	public function transform(WriteTitle $writetitle)
	{
		return [
			'id' => $writetitle->id,
			'title' => $writetitle->title,
			'created_at' => $writetitle->created_at->toDateTimeString(),
		];
	}




}