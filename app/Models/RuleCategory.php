<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuleCategory extends Model
{
	protected $fillable = ['travel_id', 'rule_category_name', 'type'];
	
    public function travels()
    {
    	return $this->belongsToMany(Travel::class);
    }

    public function rules()
    {
    	return $this->hasManyThrough(Rule::class, RuleCategoryTravel::class);
    }
    
}
