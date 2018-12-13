<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Route::class, function (Faker $faker) {
	$sentence = $faker->sentence();
	$updated_at = $faker->dateTimeThisMonth();
	$created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'day' => $faker->bothify('Day #'),
        'date' => $faker->date($format = 'Y-m-d', $min = 'now'),
        'description' => $sentence,
        'created_at' => $created_at,
		'updated_at' => $updated_at,
    ];
});
