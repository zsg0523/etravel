<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Local::class, function (Faker $faker) {
    $now = Carbon::now()->toDateTimeString();
    return [
        'title' => $faker->sentence,
        'content' => $faker->text,
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
