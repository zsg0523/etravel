<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = ['rule_category_id','rule'];

    public function ruleCategory()
    {
    	return $this->belongsTo(RuleCategory::class);
    }

    public function examines()
    {
        return $this->hasMany(Examine::class);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class, 'examines')->withPivot('before', 'after');
    }

}
