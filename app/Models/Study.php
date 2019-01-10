<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $fillable = ['title','image','body'];

    public function route()
    {
    	return $this->belongsTo(Route::class);
    }

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }

  

    
}
