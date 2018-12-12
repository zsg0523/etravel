<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuleCategory extends Model
{
    public function rule()
    {
    	return $this->hasMany(Rule::class);
    }
}
