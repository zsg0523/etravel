<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examine extends Model
{
    protected $fillable = ['before', 'after'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function rule()
    {
    	return $this->belongsTo(Rule::class);
    }

}
