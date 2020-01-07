<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'order_id' => function(){
    		return App\Order::all()->random();	
    	},
		'product_id' => function(){
    		return App\Product::all()->random();	
    	},
		'quantity' => $faker->numberBetween(5, 10),
		'created_at' => $faker->dateTimeBetween('-13 days', '+0 days')
    ];
});
