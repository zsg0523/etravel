<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content'];

    public function study()
    {
    	return $this->belongsTo(Study::class);
    }
}
