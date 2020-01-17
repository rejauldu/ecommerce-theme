<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Traffic;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Traffic::class, function (Faker $faker) {
    return [
		'user_id' => function(){
    		return App\User::all()->random();
    	},
        'ip' => $faker->ipv4,
        'latitude' => $faker->randomFloat(9, $min = -90, $max = 90),
		'longitude' => $faker->randomFloat(10, $min = -180, $max = 180),
        'browser' => $faker->randomElement(['MSIE', 'Trident', 'Firefox', 'Chrome', 'Opera Mini', 'Opera', 'Safari', 'Edge', 'Other']),
		'browser_version' => $faker->randomElement(['MSIE', 'Trident', 'Firefox', 'Chrome', 'Opera Mini', 'Opera', 'Safari', 'Edge', 'Other']),
		'platform' => $faker->randomElement(['Windows', 'Linux', 'iOS', 'Other']),
		'device' => $faker->randomElement(['Computer', 'Mobile', 'Mobile', 'Computer', 'Tab', 'Other']),
		'visited_page' => $faker->randomElement(['home', 'cart', 'products', 'product', 'dashboard', 'other']),
		'updated_at' => $faker->dateTimeBetween('-500 days', '+0 days'),
		'created_at' => $faker->dateTimeBetween('-1000 days', '+0 days'),
    ];
});
