<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\News::class, function (Faker $faker) {
	$now = Carbon::now()->toDateTimeString();
    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'view_counts' => $faker->randomDigit,
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
