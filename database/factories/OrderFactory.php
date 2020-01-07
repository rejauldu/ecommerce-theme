<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'payment_id' => function(){
    		return App\Payment::all()->random();	
    	},
		'customer_id' => function(){
    		return App\User::all()->random();	
    	},
		'shipper_id' => function(){
    		return App\Shipper::all()->random();	
    	},
		'order_status_id' => function(){
    		return App\OrderStatus::all()->random();	
    	},
		'required_at' => $faker->dateTimeBetween('-13 days', '+0 days'),
		'shipping_date' => $faker->dateTimeBetween('-13 days', '+0 days'),
		'paid_at' => $faker->dateTimeBetween('-13 days', '+0 days')
    ];
});
