<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['student_number','grade','class','description'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }


    public function school()
    {
    	return $this->belongsTo(School::class);
    }

}
