<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
		'role_id' => function(){
    		return App\Role::all()->random();	
    	}
    ];
});
