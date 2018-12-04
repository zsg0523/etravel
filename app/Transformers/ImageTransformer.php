<?php

/**
 * @Author: Eden
 * @Date:   2018-12-04 15:26:56
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-04 16:06:42
 */
namespace App\Transformers;

use App\Models\Image;
use League\Fractal\TransformerAbstract;

class ImageTransformer extends TransformerAbstract
{
	public function transform(Image $image)
	{
		return [
			'id' => $image->id,
			'user_id' => $image->user_id,
			'type' => $image->type,
			'path' => $image->path,
			'created_at' => $image->created_at->toDateTimeString(),
			'updated_at' => $image->updated_at->toDateTimeString(),
		];
	}
}

