<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = ['travel_name', 'travel_at', 'travel_return','travel_introduction', 'urgency', 'assembly_station', 'assembly_at', 'dissolution_station', 'dissolution_at', 'add_by', 'travel_status', 'image', 'school_name', 'view_plan', 'meal_plan'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'groups');
    }

    public function telephones()
    {
        return $this->hasMany(Telephone::class);
    }

    public function assemblies()
    {
    	return $this->hasMany(Assembly::class);
    }

    public function flight()
    {
    	return $this->hasMany(Flight::class);
    }

    public function hotel()
    {
    	return $this->hasMany(Hotel::class);
    }

    /** [users 多对多关联关系] */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    
    /** [rule_categories 多对多关联] */
    public function rule_categories()
    {
        return $this->hasMany(RuleCategory::class);
    }

    /** [rules 远程一对多] */
    public function rules()
    {
        return $this->hasManyThrough(Rule::class, RuleCategory::class);
    }


    public function routes()
    {
        return $this->hasMany(Route::class);
    }

    public function studies()
    {
        return $this->hasManyThrough(Study::class, Route::class);
    }

    public function summaries()
    {
        return $this->hasMany(Write::class);
    }

    public function locals()
    {
        return $this->hasMany(Local::class);
    }

    public function evaluation_categories()
    {
        return $this->hasMany(EvaluationCategory::class);
    }

    public function write_titles()
    {
        return $this->hasMany(WriteTitle::class);
    }
}
