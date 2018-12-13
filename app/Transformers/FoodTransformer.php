<?php

/**
 * @Author: Eden
 * @Date:   2018-12-13 16:51:10
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-13 17:35:12
 */
namespace App\Transformers;

use App\Models\Food;
use League\Fractal\TransformerAbstract;

class FoodTransformer extends TransformerAbstract
{
	public function transform(Food $food)
	{
		return [
			'id' => $food->id,
			'route_id' => $food->route_id,
			'title' => $food->title,
			'content' => $food->content,
			'description' => $food->description
		];
	}
}