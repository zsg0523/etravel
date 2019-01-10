<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
	protected $fillable = ['phone', 'leader', 'duty'];
	
    public function travel()
    {
    	$this->belongsTo(Travel::class);
    }
}
