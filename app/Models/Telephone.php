<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $fillable = ['name', 'phone', 'area_code', 'travel_id', 'duty'];

    
    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }
}
