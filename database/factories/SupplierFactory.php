<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'company_name' => $faker->word,
		'contact_name' => $faker->name,
		'address1' => $faker->address,
		'address2' => $faker->address,
		'division_id' => function(){
    		return App\Division::all()->random();	
    	},
		'district_id' => function(){
    		return App\District::where('')->random();	
    	},
		'upazila_id' => function(){
    		return App\Upazila::all()->random();	
    	},
		'union_id' => function(){
    		return App\Union::all()->random();	
    	},
		'region_id' => function(){
    		return App\Region::all()->random();	
    	},
		'phone' => $faker->phoneNumber,
		'fax' => $faker->faxNumber,
		'email' => $faker->unique()->safeEmail,
		'website' => $faker->domainName,
		'payment_id' => function(){
    		return App\Payment::all()->random();	
    	},
		'discount_type' => $faker->sentence(),
		'discount_percentage' => $faker->numberBetween(5, 50),
		'category_id' => function(){
    		return App\Category::all()->random();	
    	},
		'discount_available' => $faker->word,
		'user_id' => function(){
    		return App\User::all()->random();	
    	},
		'ranking' => $faker->word,
		'note' => $faker->word
    ];
});
