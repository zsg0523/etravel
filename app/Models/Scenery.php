<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scenery extends Model
{
    public function route()
    {
    	return $this->belongsTo(Route::class);
    }
}
