<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	protected $fillable = ['title','content','description'];
	
    public function route()
    {
    	return $this->belongsTo(Route::class);
    }
}
