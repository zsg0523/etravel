<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = ['travel_name','travel_at','travel_introduction'];

    public function assembly()
    {
    	return $this->hasOne(Assembly::class);
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
}
