<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['day','date','description'];

    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }

    public function sceneries()
    {
    	return $this->hasMany(Scenery::class);
    }

    public function foods()
    {
    	return $this->hasMany(Food::class);
    }

    public function studies()
    {
        return $this->hasMany(Study::class);
    }

    /** [getTagAttribute 设置tag访问器] */
    public function getTagAttribute($value)
    {
        return $this->travel->travel_name . ' | ' .$this->attributes['day'];
    }
}
