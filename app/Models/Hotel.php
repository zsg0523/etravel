<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['travel_id','hotel_name','hotel_address','hotel_phone','hotel_date'];

    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }
}
