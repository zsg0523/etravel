<?php

/**
 * @Author: Eden
 * @Date:   2018-12-11 10:49:45
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-11 12:32:57
 */
namespace App\Transformers;

use App\Models\News;
use League\Fractal\TransformerAbstract;

class NewTransformer extends TransformerAbstract
{
	public function transform(News $news)
	{
		return [
			'id' => $news->id,
			'title' => $news->title,
			'body' => $news->body,
			'image' => $news->image,
			'view_counts' => $news->view_counts,
			'created_at' => $news->created_at->toDateTimeString(),
			'updated_at' => $news->updated_at->toDateTimeString()
		];
	}
}