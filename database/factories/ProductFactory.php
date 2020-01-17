<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sku' => $faker->numberBetween(100000, 1000000),
		'name' => $faker->name,
		'description' => $faker->paragraph,
		'supplier_id' => function(){
    		return App\Supplier::all()->random();	
    	},
		'category_id' => function(){
    		return App\Category::all()->random();	
    	},
		'quantity_per_unit' => $faker->numberBetween(5, 10),
		'msrp' => $faker->numberBetween(50, 100),
		'size_id' => function(){
    		return App\Size::all()->random();
    	},
		'color_id' => function(){
    		return App\Color::all()->random();
    	},
		'discount' => $faker->numberBetween(10, 50),
		'weight' => $faker->numberBetween(5, 10),
		'stock' => $faker->numberBetween(5, 10),
		'unit_id' => function(){
    		return App\Unit::all()->random();
    	},
		'unit_on_order' => $faker->numberBetween(1, 5),
		'reorder_level' => $faker->numberBetween(1, 100),
		'is_available' => $faker->numberBetween(0, 1),
		'discount_available' => $faker->numberBetween(0, 1),
		'ranking' => $faker->numberBetween(1, 100),
		'note' => $faker->paragraph,
		'created_at' => $faker->dateTimeBetween('-13 days', '+0 days'),
    ];
});
