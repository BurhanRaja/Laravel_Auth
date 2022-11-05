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
            'name'=> 'Viskash',
            'email'=> 'vikash@yahoo.com'
        ]);

        factory(Product::class, 2)->create([
            'user_id'=> $user->id
        ]);
    }
}
