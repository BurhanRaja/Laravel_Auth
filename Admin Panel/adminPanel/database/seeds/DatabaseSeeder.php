<?php

use App\Product;
use App\User;
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
        $user = factory(User::class)->create([
            'name'=> 'Nikhil',
            'email'=> 'nikhil@yahoo.com'
        ]);

        factory(Product::class, 3)->create([
            'user_id'=> $user->id
        ]);
    }
}
