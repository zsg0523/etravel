<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Examine::class, function (Faker $faker) {

	$updated_at = $faker->dateTimeThisMonth();
	$created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'before' => 1,
        'after' => 1,
        'created_at' => $created_at,
		'updated_at' => $updated_at,
    ];
});
