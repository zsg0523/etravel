<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = ['travel_name','travel_at','travel_introduction'];

    public function assembly()
    {
    	return $this->hasOne(Assembly::class);
    }
}