<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuleCategory extends Model
{
	protected $fillable = ['travel_id', 'rule_category_name', 'type', 'content'];
	

    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }

    public function rules()
    {
    	return $this->hasMany(Rule::class);
    }
    /** [getTagAttribute 访问器 标签] */
    public function getTagAttribute($value)
    {
        return $tag = $this->travel->travel_name . ' | ' . $this->attributes['rule_category_name'];
    }
    
}
