<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Super
        $role = Role::create([
            'name' => 'Super'
        ]);
        $permissions = [

            'manage dashboard',
            'manage brands',
            'manage categories',
            'manage complaints',
            'manage delivery_methods',
            'manage orders',
            'manage products',
            'manage roles_permissions',
            'manage settings',
            'manage customers',
            'manage staff'
        ];
        $role->syncPermissions($permissions);

        //Director
        $level2 = Role::create([
            'name' => 'Director'
        ]);
        $permissions = [

            'manage dashboard',
            'manage brands',
            'manage categories',
            'manage complaints',
            'manage delivery_methods',
            'manage orders',
            'manage products',
            'manage roles_permissions',
            'manage settings',
            'manage customers',
            'manage staff'
        ];
        $level2->syncPermissions($permissions);

        //Admin
        $level3 = Role::create([
            'name' => 'Admin'
        ]);
        $permissions = [
            'manage dashboard',
            'manage brands',
            'manage categories',
            'manage complaints',
            'manage delivery_methods',
            'manage orders',
            'manage products',
            'manage customers',
        ];
        $level3->syncPermissions($permissions);

        //Agent
        $level3 = Role::create([
            'name' => 'Agent'
        ]);
        $permissions = [
            'manage dashboard',
            'manage complaints',
            'manage orders',
            'manage products',
            'manage customers',
        ];
        $level3->syncPermissions($permissions);

        //Customer
        $level4 = Role::create([
            'name' => 'Customer'
        ]);
        $permissions = [
            'manage account',
            'buy item',
            'member dashboard'
        ];
        $level4->syncPermissions($permissions);

    }
}
