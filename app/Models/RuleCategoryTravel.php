<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuleCategoryTravel extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'rule_category_travel';

    public function rules()
    {
    	return $this->hasMany(Rule::class);
    }

    public function rule_category()
    {
        return $this->belongsTo(RuleCategory::class);
    }

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
}
