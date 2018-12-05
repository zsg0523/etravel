<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Telephone::class, function (Faker $faker) {
	$now = Carbon::now()->toDateTimeString();
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'area_code' => $faker->areaCode,
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
