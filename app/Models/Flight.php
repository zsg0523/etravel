<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
	protected $fillable = ['travel_id','date','from','to','flight','takeoff_time','arrival_time','is_return', 'to_flight', 'from_flight'];

    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }
}
