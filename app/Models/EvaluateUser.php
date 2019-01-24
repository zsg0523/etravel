<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluateUser extends Model
{
    protected $fillable = ['option', 'user_id', 'evaluation_id'];

    protected $table = 'evaluation_user';

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function evaluation()
    {
    	return $this->belongsTo(Evaluation::class);
    }
}
