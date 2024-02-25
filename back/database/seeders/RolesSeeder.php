<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role_admin  = Role::create(['name' => 'admin']);
        $role_editor = Role::create(['name' => 'editor']);

        $permision_create_role = Permission::create(['name'=>'create roles']);
        $permision_read_role = Permission::create(['name'=>'read roles']);
        $permision_update_role = Permission::create(['name'=>'update roles']);
        $permision_delete_role = Permission::create(['name'=>'delete roles']);

        $permission_admin = [
            $permision_create_role,
            $permision_read_role,
            $permision_update_role,
            $permision_delete_role
        ];

        $role_admin->syncPermissions($permission_admin);
    }
}
