<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Hotel::class, function (Faker $faker) {
	$now = Carbon::now()->toDateTimeString();
    return [
        'hotel_name' => $faker->company,
        'hotel_address' => $faker->streetAddress,
        'hotel_phone' => $faker->phoneNumber,
        'check_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'leave_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'times' => $faker->randomDigitNotNull,
        'created_at' => $now,
       	'updated_at' => $now
    ];
});
