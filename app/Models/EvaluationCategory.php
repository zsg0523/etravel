<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationCategory extends Model
{
    protected $fillable = ['travel_id', 'title'];

    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }

    public function evaluations()
    {
    	return $this->hasMany(Evalution::class);
    }


    
}
