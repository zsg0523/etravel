<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    protected $fillable = ['user_id', 'travel_id', 'company_id', 'code_one', 'code_two', 'emergency_phone_one', 'emergency_phone_two', 'emergency_email_one', 'emergency_email_two'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }
    
    public function company()
    {
    	return $this->belongsTo(Company::class);
    }
}
