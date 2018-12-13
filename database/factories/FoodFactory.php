<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Food::class, function (Faker $faker) {

	$sentence = $faker->sentence();
	$updated_at = $faker->dateTimeThisMonth();
	$created_at = $faker->dateTimeThisMonth($updated_at);

    return [
    	'title' => $faker->randomElement(array ('早餐','午餐','晚餐')),
    	'content' => $faker->randomElement(array ('酒店内','航班简餐','市内餐厅','空中花园')),
    	'description' => $sentence,
        'created_at' => $created_at,
		'updated_at' => $updated_at,
    ];
});
