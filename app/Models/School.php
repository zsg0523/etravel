<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['school_name','school_introduction','school_address'];

    /** [user 一对多关联] */
    public function students()
    {
    	return $this->hasMany(Student::class);
    }

}
