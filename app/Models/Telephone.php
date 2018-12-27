<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $fillable = ['name', 'phone', 'area_code', 'travel_id'];

    // 
    public function travle()
    {
    	return $this->belongsTo(Travel::class);
    }
}
