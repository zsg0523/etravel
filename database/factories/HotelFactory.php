<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Hotel::class, function (Faker $faker) {
	$now = Carbon::now()->toDateTimeString();
    return [
        'hotel_name' => $faker->company,
        'hotel_address' => $faker->streetAddress,
        'hotel_phone' => $faker->phoneNumber,
        'hotel_date' => '28/5 & 29/5',
        'created_at' => $now,
       	'updated_at' => $now
    ];
});
