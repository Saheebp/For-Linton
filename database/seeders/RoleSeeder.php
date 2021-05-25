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
            'name' => 'Level 1'
        ]);
        $permissions = [

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
        ];
        $role->syncPermissions($permissions);


        //Director
        $level2 = Role::create([
            'name' => 'Level 2'
        ]);
        $permissions = [

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
        ];
        $level2->syncPermissions($permissions);



        //Admin
        $level3 = Role::create([
            'name' => 'Level 3'
        ]);
        $permissions = [
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
        ];
        $level3->syncPermissions($permissions);




        //Manager
        $level4 = Role::create([
            'name' => 'Level 4'
        ]);
        $permissions = [
            'manage dashboard',
            'manage batch',
            'manage categories',
            'manage warehouse',
            'manage inventory',
            'manage projects',
            'manage payments',
            'manage reports',
        ];
        $level4->syncPermissions($permissions);



        //Account
        $level5 = Role::create([
            'name' => 'Level 5'
        ]);
        $permissions = [
            'manage dashboard',
            'manage warehouse',
            'manage inventory',
            'manage projects',
            'manage payments',
            'manage reports',
        ];
        $level5->syncPermissions($permissions);



        //Officers
        $level6 = Role::create([
            'name' => 'Level 6'
        ]);
        $permissions = [
            'manage dashboard',
            'manage warehouse',
            'manage inventory',
            'manage projects',
            'manage payments',
            'manage reports',
        ];
        $level6->syncPermissions($permissions);


        
        //Contractor
        $level7 = Role::create([
            'name' => 'Level 7'
        ]);
        $permissions = [
            'manage account',
            'manage quote',
            'contractor dashboard'
        ];
        $level7->syncPermissions($permissions);

    }
}
