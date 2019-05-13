<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{	
	/**
	 * [emergency 紧急联系人电话和邮箱]
	 * @return [type] [实例]
	 */
    public function emergency()
    {
    	return $this->hasOne(Emergency::class);
    }
}
