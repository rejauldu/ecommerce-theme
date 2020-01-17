<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		'phone' => $faker->phoneNumber,
		'role_id' => 1,
		'credit_card' => $faker->numberBetween(1000, 10000),
		'payment_id' => $faker->numberBetween(1, 5),
		'card_exp_month' => $faker->numberBetween(1, 12),
		'card_exp_year' => $faker->numberBetween(2019, 2025),
		'address' => $faker->address,
		'region_id' => function(){
    		return App\Locations\Region::all()->random();
    	},
		'union_id' => function(){
    		return App\Locations\Union::all()->random();
    	},
		'upazila_id' => function(){
    		return App\Locations\Upazila::all()->random();
    	},
		'district_id' => function(){
    		return App\Locations\District::all()->random();	
    	},
		'division_id' => function(){
    		return App\Locations\Division::all()->random();	
    	},
		'billing_address' => $faker->address,
		'billing_region_id' => function(){
    		return App\Locations\Region::all()->random();
    	},
		'billing_union_id' => function(){
    		return App\Locations\Union::all()->random();
    	},
		'billing_upazila_id' => function(){
    		return App\Locations\Upazila::all()->random();
    	},
		'billing_district_id' => function(){
    		return App\Locations\District::all()->random();	
    	},
		'billing_division_id' => function(){
    		return App\Locations\Division::all()->random();	
    	},
		'shipping_address' => $faker->address,
		'shipping_region_id' => function(){
    		return App\Locations\Region::all()->random();
    	},
		'shipping_union_id' => function(){
    		return App\Locations\Union::all()->random();
    	},
		'shipping_upazila_id' => function(){
    		return App\Locations\Upazila::all()->random();
    	},
		'shipping_district_id' => function(){
    		return App\Locations\District::all()->random();	
    	},
		'shipping_division_id' => function(){
    		return App\Locations\Division::all()->random();	
    	},
		'remember_token' => Str::random(10),
    ];
});
