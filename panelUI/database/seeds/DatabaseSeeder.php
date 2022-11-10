<?php

use App\Admin;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // ...

        // $this->call([
        //     RoleAndPermissionSeeder::class,
        // ]);
        // ...

        factory(Admin::class)->create([
            'name' => 'Burhanuddin',
            'email' => 'burhan@hello.com',
            'password' => Hash::make('1234')
        ]);
    }
}
