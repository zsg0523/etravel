<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Travel::class, function (Faker $faker) {
	$date_time = $faker->date . ' ' . $faker->time;
	$now = Carbon::now()->toDateTimeString();
    return [
        'travel_name' => $faker->name,
        'travel_at' => $date_time,
        'travel_introduction' => $faker->text,
        'assembly_station' => $faker->streetAddress,
        'assembly_at' => $now,
        'dissolution_station' => $faker->streetAddress,
        'dissolution_at' => $now,
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});
