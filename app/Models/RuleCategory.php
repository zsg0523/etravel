<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuleCategory extends Model
{
	protected $fillable = ['travel_id', 'rule_category_name', 'type'];
	
    public function rule()
    {
    	return $this->hasMany(Rule::class);
    }

    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }

    
}
