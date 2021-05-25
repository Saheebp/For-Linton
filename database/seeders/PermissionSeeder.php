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
            'manage batch',
            'manage categories',
            'manage warehouse',
            'manage inventory',
            'manage projects',
            'manage payments',
            'manage roles_permissions',
            'manage settings',
            'manage contractors',
            'manage staff',
            'manage logs',
            'manage reports',
            'manage staff_reviews',

            //contractor
            'manage account',
            'manage quote',
            'contractor dashboard'
        ];

        foreach ($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
    }
}
