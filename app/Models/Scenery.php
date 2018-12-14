<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scenery extends Model
{
	protected $fillable = ['time','content','description'];


    public function route()
    {
    	return $this->belongsTo(Route::class);
    }


    
}
