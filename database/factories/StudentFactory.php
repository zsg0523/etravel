<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Student::class, function (Faker $faker) {
	$now = Carbon::now()->toDateTimeString();
    return [
        'student_number' => $faker->creditCardNumber,
        'class' => $faker->randomElement($array = array ('A','B','C','D','E')),
        'grade' => $faker->randomDigitNotNull,
        'description' => $faker->sentence,
        'created_at' => $now,
        'updated_at' => $now
    ];
});
