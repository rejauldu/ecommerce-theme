<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
		'description' => $faker->sentence(),
		'picture' => 'not-found.jpg',
		'updated_at' => $faker->dateTimeBetween('-15 days', '-14 days'),
		'created_at' => $faker->dateTimeBetween('-20 days', '-14 days')
    ];
});
