<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            //admin
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
            'manage staff',

            //member
            'manage account',
            'buy item',
            'member dashboard'
        ];

        foreach ($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
    }
}
