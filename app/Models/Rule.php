<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = ['rule_category_id','rule'];

    public function category()
    {
    	return $this->belongsTo(RuleCategory::class);
    }

    public function examines()
    {
        return $this->hasMany(Examine::class);
    }

}
