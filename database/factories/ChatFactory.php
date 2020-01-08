<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Chat;
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

$factory->define(Chat::class, function (Faker $faker) {
    return [
        'message' => $faker->sentence(),
        'type' => 'text',
        'sender_id' => function(){
    		return App\User::all()->random();
    	},
		'receiver_id' => function(){
    		return App\User::all()->random();
    	},
        'sent_at' => $faker->dateTimeBetween('-13 days', '-10 days'),
        'viewed_at' => $faker->dateTimeBetween('-10 days', '+5 days'),
		'deleted_by' => 0,
		'updated_at' => $faker->dateTimeBetween('-15 days', '-14 days'),
		'created_at' => $faker->dateTimeBetween('-20 days', '-14 days')
    ];
});
