<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['guard_name' => 'admin', 'name' => 'create-product']);
        Permission::create(['guard_name' => 'admin', 'name' => 'edit-product']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete-product']);

        $manager = Role::create(['guard_name' => 'admin', 'name' => 'manager']);
        $juniorManager = Role::create(['guard_name' => 'admin', 'name' => 'junior_manager']);

        $manager->givePermissionTo([
            'create-product',
            'edit-product',
            'delete-product'
        ]);

        $juniorManager->givePermissionTo([
            'edit-product'
        ]);
        
    }
}
