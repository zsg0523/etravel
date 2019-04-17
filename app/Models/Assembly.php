<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
	protected $fillable = ['travel_id', 'phone', 'leader', 'duty','area_code'];
	
    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }
}
