<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		//factory(App\Category::class,8)->create();
		//factory(App\Payment::class, 5)->create();
		factory(App\Supplier::class, 5)->create();
    }
}
