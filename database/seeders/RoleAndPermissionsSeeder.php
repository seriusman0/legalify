<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Buat Permission
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        // Buat Role
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assign Permission ke Role
        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users'
        ]);

        $userRole->givePermissionTo([
            'edit-users'
        ]);
    }
}