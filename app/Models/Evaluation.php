<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['content', 'type'];

    public function evaluation_category()
    {
    	return $this->belongsTo(EvaluationCategory::class);
    }


    
}
