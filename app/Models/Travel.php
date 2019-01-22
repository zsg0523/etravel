<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = ['travel_name', 'travel_at', 'travel_introduction', 'urgency'];

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

    public function summaries()
    {
        return $this->hasMany(Write::class);
    }

    public function locals()
    {
        return $this->hasMany(Local::class);
    }
}
