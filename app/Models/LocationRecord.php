<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationRecord extends Model
{
	protected $table = 'location_records';
    protected $fillable = ['user_id', 'travel_id', 'coordinate'];
}