<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WriteTitle extends Model
{
    protected $fillable = ['title', 'travel_id'];


    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }
}
