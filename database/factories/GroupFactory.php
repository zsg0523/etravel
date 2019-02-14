<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Group::class, function (Faker $faker) {

    $class = $faker->randomDigitNotNull . '' . $faker->randomElement($array = array ('A','B','C','D','E'));
	$sentence = $faker->sentence();
	$updated_at = $faker->dateTimeThisMonth();
	$created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'student_number' => $faker->creditCardNumber,
        'class' => $class,
        'duty' => $faker->jobTitle,
        'group' => $faker->randomDigitNotNull,
        'room' => $faker->numberBetween($min = 1000, $max = 9000),
        'created_at' => $created_at,
		'updated_at' => $updated_at,
    ];
});
