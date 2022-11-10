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

        $this->call([
            RoleAndPermissionSeeder::class,
        ]);
        // ...
    }
}
