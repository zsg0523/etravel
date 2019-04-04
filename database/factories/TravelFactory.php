<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Travel::class, function (Faker $faker) {
	$date_time = $faker->date . ' ' . $faker->time;
	$now = Carbon::now()->toDateTimeString();
    return [
        'travel_name' => $faker->name,
        'travel_at' => $faker->date,
        'travel_return' => $faker->date,
        'travel_introduction' => $faker->text,
        'assembly_station' => $faker->streetAddress,
        'assembly_at' => $now,
        'dissolution_station' => $faker->streetAddress,
        'dissolution_at' => $now,
        'urgency' => $faker->sentence,
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});
