<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create Permissions
        Permission::create(['name' => 'create blogs']);
        Permission::create(['name' => 'edit blogs']);
        Permission::create(['name' => 'delete blogs']);
        Permission::create(['name' => 'publish blogs']);
        Permission::create(['name' => 'manage users']);

        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);
        $authorRole = Role::create(['name' => 'author']);

        // Assign Permissions to Roles
        $adminRole->givePermissionTo([
            'create blogs',
            'edit blogs',
            'delete blogs',
            'publish blogs',
            'manage users'
        ]);

        $editorRole->givePermissionTo([
            'create blogs',
            'edit blogs',
            'publish blogs'
        ]);

        $authorRole->givePermissionTo([
            'create blogs',
            'edit blogs'
        ]);
    }
}
