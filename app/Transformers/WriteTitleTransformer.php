<?php

/**
 * @Author: Eden
 * @Date:   2018-12-17 18:18:12
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-02-27 18:12:46
 */
namespace App\Transformers;

use App\Models\WriteTitle;
use League\Fractal\TransformerAbstract;

class WriteTitleTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['travel'];

	public function transform(WriteTitle $writetitle)
	{
		return [
			'id' => $writetitle->id,
			'travel_id' => $writetitle->travel_id,
			'title' => $writetitle->title,
			'created_at' => $writetitle->created_at->toDateTimeString(),
		];
	}


	public function includeTravel(WriteTitle $writetitle)
	{
		return $this->item($writetitle->travel, new TravelTransformer());
	}







}