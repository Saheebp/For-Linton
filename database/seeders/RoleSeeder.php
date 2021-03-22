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
            'name' => 'SuperUser'
        ]);
        $permissions = [

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
            'manage tickets',
            'manage delivery_methods',
            'manage orders',
            'manage products',
            'manage payments',
            'manage settings',
            'manage customers',
            'manage staff',
            'manage news',
            'manage reports',
            'manage billing',
            'manage staff_reviews',
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
            'manage tickets',
            'manage delivery_methods',
            'manage orders',
            'manage products',
            'manage payments',
            'manage settings',
            'manage customers',
            'manage staff',
            'manage news',
            'manage reports',
            'manage staff_reviews',
        ];
        $level3->syncPermissions($permissions);




        //Manager
        $level4 = Role::create([
            'name' => 'Manager'
        ]);
        $permissions = [
            'manage dashboard',
            'manage brands',
            'manage categories',
            'manage tickets',
            'manage delivery_methods',
            'manage orders',
            'manage products',
            'manage payments',
            'manage settings',
            'manage customers',
            'manage staff',
            'manage news',
            'manage staff_reviews',
        ];
        $level4->syncPermissions($permissions);



        //Account
        $level5 = Role::create([
            'name' => 'Account'
        ]);
        $permissions = [
            'manage dashboard',
            'manage tickets',
            'manage orders',
            'manage payments',
            'manage customers',
            'manage staff',
            'manage staff_reviews',
        ];
        $level5->syncPermissions($permissions);



        //Agent
        $level3 = Role::create([
            'name' => 'Agent'
        ]);
        $permissions = [
            'manage dashboard',
            'manage tickets',
            'manage orders',
            'manage payments',
            'manage customers',
            'manage staff',
            'manage staff_reviews',
        ];
        $level3->syncPermissions($permissions);


        
        //Customer
        // $level4 = Role::create([
        //     'name' => 'Customer'
        // ]);
        // $permissions = [
        //     'manage account',
        //     'buy item',
        //     'member dashboard'
        // ];
        // $level4->syncPermissions($permissions);

    }
}
