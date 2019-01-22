<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Assembly::class, function (Faker $faker) {
	$updated_at = $faker->dateTimeThisMonth();
	$created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'leader' => $faker->name,
        'phone' => $faker->phoneNumber,
        'duty' => $faker->jobTitle,
        'created_at' => $created_at,
		'updated_at' => $updated_at,
    ];
});
