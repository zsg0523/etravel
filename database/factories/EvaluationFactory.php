<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Evaluation::class, function (Faker $faker) {

	$now = Carbon::now()->toDateTimeString();

    return [
        'content' => $faker->sentence,
        'type' => $faker->randomElement($array = array (1,2,3)),
        'created_at' => $now,
        'updated_at' => $now
    ];
});
