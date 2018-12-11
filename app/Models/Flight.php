<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
	protected $fillable = ['travel_id','date','site','flight','takeoff_time','arrival_time','is_return'];

    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }
}
