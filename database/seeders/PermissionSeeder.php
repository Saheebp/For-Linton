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
            'manage tickets',
            'manage delivery_methods',
            'manage orders',
            'manage products',
            'manage payments',
            'manage roles_permissions',
            'manage settings',
            'manage customers',
            'manage staff',
            'manage news',
            'manage logs',
            'manage reports',
            'manage billing',
            'manage staff_reviews',

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
