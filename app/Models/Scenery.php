<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scenery extends Model
{
	protected $fillable = ['time','content','description', 'coordinate'];


    public function route()
    {
    	return $this->belongsTo(Route::class);
    }


    
}
