<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Rule::class, function (Faker $faker) {

	$sentence = $faker->sentence();
	$updated_at = $faker->dateTimeThisMonth();
	$created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'rule' => $sentence,
		'created_at' => $created_at,
		'updated_at' => $updated_at,
    ];
});
