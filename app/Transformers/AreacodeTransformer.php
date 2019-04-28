<?php

/**
 * @Author: Eden
 * @Date:   2018-12-10 11:32:32
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-29 17:57:54
 */
namespace App\Transformers;

use App\Models\Areacode;
use League\Fractal\TransformerAbstract;

class AreacodeTransformer extends TransformerAbstract
{

	public function transform(Areacode $areacode)
	{
		return [
			'id' => $areacode->id,
			'acname_en' => $areacode->acname_en,
			'acname_cn' => $areacode->acname_cn,
			'codename' => $areacode->codename,
			'acnumber' => $areacode->acnumber,
			'order_number' => $areacode->order_number,
			'show' => $areacode->show,
		];
	}
}