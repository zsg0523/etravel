<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
	protected $fillable = ['travel_id', 'phone', 'leader', 'duty'];
	
    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }
}
