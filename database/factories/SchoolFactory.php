<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\School::class, function (Faker $faker) {
	$now = Carbon::now()->toDateTimeString();
    return [
       	'school_name' => $faker->company,
       	'school_introduction' => $faker->sentence,
       	'school_address' => $faker->streetAddress,
       	'created_at' => $now,
       	'updated_at' => $now
    ];
});
