<?php

/**
 * @Author: Eden
 * @Date:   2018-12-05 10:11:20
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-04-11 18:36:07
 */
namespace App\Transformers;

use App\Models\Emergency;
use League\Fractal\TransformerAbstract;

class EmergencyTransformer extends TransformerAbstract
{
	public function transform(Emergency $emergency)
	{
		return [
			'id' => $emergency->id,
			'user_id' => $emergency->user_id,
			'code_one' => $emergency->code_one,
			'code_two' => $emergency->code_two,
			'emergency_phone_one' => $emergency->emergency_phone_one,
			'emergency_phone_two' => $emergency->emergency_phone_two,
			'emergency_email_one' => $emergency->emergency_email_one,
			'emergency_email_two' => $emergency->emergency_email_two,
			'category' => $emergency->category,
			'created_at' => $emergency->created_at->toDateTimeString(),
			'updated_at' => $emergency->updated_at->toDateTimeString(),
		];
	}
}