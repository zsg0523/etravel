<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Scenery::class, function (Faker $faker) {

	$sentence = $faker->sentence();
	$updated_at = $faker->dateTimeThisMonth();
	$created_at = $faker->dateTimeThisMonth($updated_at);
	$time = $faker->time($format = 'H:i', $max = 'now').'-'.$faker->time($format = 'H:i', $max = 'now');
    return [
        'time' => $time,
        'content' => $faker->country,
        'description' => $sentence,
        'created_at' => $created_at,
		'updated_at' => $updated_at,
    ];
});
