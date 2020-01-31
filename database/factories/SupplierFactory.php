<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'company_name' => $faker->word,
		'contact_name' => $faker->name,
		'address' => $faker->address,
		'division_id' => function(){
    		return App\Locations\Division::all()->random();	
    	},
		'district_id' => function(){
    		return App\Locations\District::all()->random();	
    	},
		'upazila_id' => function(){
    		return App\Locations\Upazila::all()->random();
    	},
		'union_id' => function(){
    		return App\Locations\Union::all()->random();
    	},
		'region_id' => function(){
    		return App\Locations\Region::all()->random();
    	},
		'phone' => $faker->phoneNumber,
		'fax' => $faker->phoneNumber,
		'email' => $faker->unique()->safeEmail,
		'website' => $faker->domainName,
		'payment_id' => function(){
    		return App\Payment::all()->random();
    	},
		'discount_type' => $faker->sentence(),
		'discount' => $faker->numberBetween(5, 50),
		'category_id' => function(){
    		return App\Category::all()->random();
    	},
		'discount_available' => $faker->numberBetween(0, 1),
		'user_id' => function(){
    		return App\User::all()->random();
    	},
		'ranking' => $faker->numberBetween(1, 100),
		'note' => $faker->paragraph
    ];
});
