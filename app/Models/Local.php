<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $fillable = ['travel_id', 'title', 'content'];

    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }
}
