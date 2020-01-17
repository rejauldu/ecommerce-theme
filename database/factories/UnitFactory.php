<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['each', 'dozen', 'kg']),
		'is_active' => 1,
    ];
});
