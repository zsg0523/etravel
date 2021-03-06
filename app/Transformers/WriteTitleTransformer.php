<?php

/**
 * @Author: Eden
 * @Date:   2018-12-17 18:18:12
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-03-08 15:25:00
 */
namespace App\Transformers;

use App\Models\WriteTitle;
use League\Fractal\TransformerAbstract;

class WriteTitleTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['travel', 'writes'];

	protected $user_id;

	public function __construct($user_id)
	{
		$this->user_id = $user_id;
	}

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

	public function includeWrites(WriteTitle $writetitle)
	{
		$writes = $writetitle->writes()->where('user_id', $this->user_id)->get();
		if (! empty($this->user_id) ) {
			return $this->collection($writes, new WriteTransformer());
		} else {
			return $this->collection($writetitle->writes, new WriteTransformer());		
		}
	}







}