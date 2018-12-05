<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Travel::class, function (Faker $faker) {
	$date_time = $faker->date . ' ' . $faker->time;
    return [
        'travel_name' => $faker->name,
        'travel_at' => $date_time,
        'travel_introduction' => $faker->text,
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});
