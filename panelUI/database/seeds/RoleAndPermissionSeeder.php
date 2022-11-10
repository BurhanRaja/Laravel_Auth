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
        Permission::create(['guard_name' => 'admin', 'name' => 'show-product']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create-product']);
        Permission::create(['guard_name' => 'admin', 'name' => 'edit-product']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete-product']);

        Permission::create(['guard_name' => 'admin', 'name' => 'show-permissions']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create-permissions']);
        Permission::create(['guard_name' => 'admin', 'name' => 'edit-permissions']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete-permissions']);

        Permission::create(['guard_name' => 'admin', 'name' => 'show-roles']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create-roles']);
        Permission::create(['guard_name' => 'admin', 'name' => 'edit-roles']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete-roles']);

        Permission::create(['guard_name' => 'admin', 'name' => 'show-admin-user']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create-admin-user']);
        Permission::create(['guard_name' => 'admin', 'name' => 'edit-admin-user']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete-admin-user']);

        $juniorManager = Role::create(['guard_name' => 'admin', 'name' => 'junior-manager']);
        $manager = Role::create(['guard_name' => 'admin', 'name' => 'manager']);
        $superAdmin = Role::create(['guard_name' => 'admin', 'name' => 'super-admin']);

        $juniorPermissions = ['show-product', 'edit-product'];
        $juniorManager->givePermissionTo($juniorPermissions);

        $managerPermissions = ['show-product', 'create-product', 'edit-product', 'delete-product'];
        $manager->givePermissionTo($managerPermissions);

        $superPermissions = [
            'show-product', 'create-product', 'edit-product', 'delete-product', 'show-roles','create-roles','edit-roles', 'delete-roles','show-admin-user', 'create-admin-user', 'edit-admin-user', 'delete-admin-user'
        ];
        $superAdmin->givePermissionTo($superPermissions);
    }
}
