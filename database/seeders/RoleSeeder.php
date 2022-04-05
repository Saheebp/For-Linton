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
        $super = Role::create([
            'name' => 'Super User'
        ]);
        $permissions = [

            //admin
            'manage dashboard',
            
            'create batch',
            'delete batch',
            'view batch',
            
            'create categories',
            'delete categories',
            'view categories',
            
            'create warehouse',
            'update warehouse',
            'delete warehouse',
            'view warehouse',
            
            'create inventory',
            'update inventory',
            'delete inventory',
            'view inventory',
            
            'create inventory item',
            'update inventory item',
            'delete inventory item',
            'view inventory item',
            'release inventory item',
            
            'view projects',
            'create projects',
            'update projects',
            'terminate projects',
            'delete projects',
            'assign to projects',
            'complete projects',
            'generate project report',
            'print project report',
            'set project reminder',

            'view tasks',
            'create tasks',
            'update tasks',
            'terminate tasks',
            'delete tasks',
            'assign to tasks',
            'complete tasks',
            'generate task report',
            'print task report',
            'set task reminder',
            
            'view payments',
            'create payments',
            'update payments',
            'delete payments',
            'cancel payments',
            'approve payments',
            'decline payments',
            
            'manage roles',
            'manage permissions',
            
            'manage settings',
            'update settings',
            
            'create contractors',
            'approve contractors',
            'delete contractors',
            
            'create staff',
            'update staff',
            'disable staff',
            'view staff',
            'update password',
            'view records',
            
            'share file',
            'manage logs',
            'manage reports',
            'manage staff_reviews',
            'program of works',

            //contractor
            'manage account',
            'manage quote',
            'contractor dashboard'
        ];
        $super->syncPermissions($permissions);


        //Director
        $level1 = Role::create([
            'name' => 'Level 1'
        ]);
        $permissions = [

            //admin
            'manage dashboard',
            
            'create batch',
            'delete batch',
            'view batch',
            
            'create categories',
            'delete categories',
            'view categories',
            
            'create warehouse',
            'update warehouse',
            'delete warehouse',
            'view warehouse',
            
            'create inventory',
            'update inventory',
            'delete inventory',
            'view inventory',
            
            'create inventory item',
            'update inventory item',
            'delete inventory item',
            'view inventory item',
            'release inventory item',
            
            'view projects',
            'create projects',
            'update projects',
            'terminate projects',
            'delete projects',
            'assign to projects',
            'complete projects',
            'generate project report',
            'print project report',
            'set project reminder',

            'view tasks',
            'create tasks',
            'update tasks',
            'terminate tasks',
            'delete tasks',
            'assign to tasks',
            'complete tasks',
            'generate task report',
            'print task report',
            'set task reminder',
            
            'view payments',
            'create payments',
            'update payments',
            'delete payments',
            'cancel payments',
            'approve payments',
            'decline payments',
            
            'manage roles',
            'manage permissions',
            
            // 'manage settings',
            // 'update settings',
            
            'create contractors',
            'approve contractors',
            'delete contractors',
            
            'create staff',
            'update staff',
            'disable staff',
            'view staff',
            'update password',
            'view records',
            
            'share file',
            'manage logs',
            'manage reports',
            'manage staff_reviews',
            'program of works',

            //contractor
            // 'manage account',
            // 'manage quote',
            // 'contractor dashboard'
        ];
        $level1->syncPermissions($permissions);


        //Admin
        $level2 = Role::create([
            'name' => 'Level 2'
        ]);
        $permissions = [
            //admin
            'manage dashboard',
            
            // 'create batch',
            // 'delete batch',
            // 'view batch',
            
            // 'create categories',
            // 'delete categories',
            // 'view categories',
            
            // 'create warehouse',
            // 'update warehouse',
            // 'delete warehouse',
            // 'view warehouse',
            
            // 'create inventory',
            // 'update inventory',
            // 'delete inventory',
            // 'view inventory',
            
            'create inventory item',
            'update inventory item',
            'delete inventory item',
            'view inventory item',
            'release inventory item',
            
            'view projects',
            'create projects',
            'update projects',
            'terminate projects',
            'delete projects',
            'assign to projects',
            'complete projects',
            'generate project report',
            'print project report',
            'set project reminder',


            'view tasks',
            'create tasks',
            'update tasks',
            'terminate tasks',
            'delete tasks',
            'assign to tasks',
            'complete tasks',
            'generate task report',
            'print task report',
            'set task reminder',
            
            'view payments',
            'create payments',
            'update payments',
            'delete payments',
            'cancel payments',
            'approve payments',
            'decline payments',
            
            'manage roles',
            'manage permissions',
            
            'manage settings',
            'update settings',
            
            'create contractors',
            'approve contractors',
            'delete contractors',
            
            'create staff',
            'update staff',
            'disable staff',
            'view staff',
            'update password',
            'view records',
            
            'share file',
            'manage logs',
            'manage reports',
            'manage staff_reviews',
            'program of works',

            //contractor
            // 'manage account',
            // 'manage quote',
            // 'contractor dashboard'
        ];
        $level2->syncPermissions($permissions);


        //Manager
        $level3 = Role::create([
            'name' => 'Level 3'
        ]);
        $permissions = [
            //admin
            'manage dashboard',
            
            // 'create batch',
            // 'delete batch',
            // 'view batch',
            
            // 'create categories',
            // 'delete categories',
            // 'view categories',
            
            // 'create warehouse',
            // 'update warehouse',
            // 'delete warehouse',
            // 'view warehouse',
            
            // 'create inventory',
            // 'update inventory',
            // 'delete inventory',
            // 'view inventory',
            
            'create inventory item',
            'update inventory item',
            'delete inventory item',
            'view inventory item',
            'release inventory item',
            
            // 'view projects',
            // 'create projects',
            // 'update projects',
            // 'terminate projects',
            // 'delete projects',
            // 'assign to projects',
            // 'complete projects',
            'generate project report',
            'print project report',
            'set project reminder',

            'view tasks',
            'create tasks',
            'update tasks',
            'terminate tasks',
            'delete tasks',
            'assign to tasks',
            'complete tasks',
            'generate task report',
            'print task report',
            'set task reminder',
            
            'view payments',
            'create payments',
            'update payments',
            // 'delete payments',
            // 'cancel payments',
            // 'approve payments',
            // 'decline payments',
            
            // 'manage roles',
            // 'manage permissions',
            
            // 'manage settings',
            // 'update settings',
            
            // 'create contractors',
            // 'approve contractors',
            // 'delete contractors',
            
            // 'create staff',
            // 'update staff',
            // 'disable staff',
            // 'view staff',
            'update password',
            'view records',
            
            'share file',
            'manage logs',
            'manage reports',
            'manage staff_reviews',
            'program of works',

            //contractor
            // 'manage account',
            // 'manage quote',
            // 'contractor dashboard'
        ];
        $level3->syncPermissions($permissions);


        //Account
        $level4 = Role::create([
            'name' => 'Level 4'
        ]);
        $permissions = [
            //admin
            'manage dashboard',
            
            // 'create batch',
            // 'delete batch',
            // 'view batch',
            
            // 'create categories',
            // 'delete categories',
            // 'view categories',
            
            // 'create warehouse',
            // 'update warehouse',
            // 'delete warehouse',
            // 'view warehouse',
            
            // 'create inventory',
            // 'update inventory',
            // 'delete inventory',
            // 'view inventory',
            
            // 'create inventory item',
            // 'update inventory item',
            // 'delete inventory item',
            'view inventory item',
            'release inventory item',
            
            // 'view projects',
            // 'create projects',
            // 'update projects',
            // 'terminate projects',
            // 'delete projects',
            // 'assign to projects',
            // 'complete projects',
            'generate project report',
            'print project report',
            'set project reminder',
            
            'view tasks',
            'create tasks',
            'update tasks',
            // 'terminate tasks',
            // 'delete tasks',
            // 'assign to tasks',
            'complete tasks',
            'generate task report',
            'print task report',
            'set task reminder',

            'view payments',
            'create payments',
            'update payments',
            // 'delete payments',
            // 'cancel payments',
            // 'approve payments',
            // 'decline payments',
            
            // 'manage roles',
            // 'manage permissions',
            
            // 'manage settings',
            // 'update settings',
            
            // 'create contractors',
            // 'approve contractors',
            // 'delete contractors',
            
            // 'create staff',
            // 'update staff',
            // 'disable staff',
            // 'view staff',
            'update password',
            'view records',
            
            'share file',
            'manage logs',
            'manage reports',
            'manage staff_reviews',
            'program of works',

            //contractor
            // 'manage account',
            // 'manage quote',
            // 'contractor dashboard'
        ];
        $level4->syncPermissions($permissions);


        //Officers
        $level5 = Role::create([
            'name' => 'Level 5'
        ]);
        $permissions = [
            //admin
            'manage dashboard',
            
            // 'create batch',
            // 'delete batch',
            // 'view batch',
            
            // 'create categories',
            // 'delete categories',
            // 'view categories',
            
            // 'create warehouse',
            // 'update warehouse',
            // 'delete warehouse',
            // 'view warehouse',
            
            // 'create inventory',
            // 'update inventory',
            // 'delete inventory',
            // 'view inventory',
            
            // 'create inventory item',
            // 'update inventory item',
            // 'delete inventory item',
            'view inventory item',
            'release inventory item',
            
            // 'view projects',
            // 'create projects',
            // 'update projects',
            // 'terminate projects',
            // 'delete projects',
            // 'assign to projects',
            // 'complete projects',
            'generate project report',
            'print project report',
            'set project reminder',

            'view tasks',
            'create tasks',
            'update tasks',
            // 'terminate tasks',
            // 'delete tasks',
            // 'assign to tasks',
            'complete tasks',
            'generate task report',
            'print task report',
            'set task reminder',
            
            'view payments',
            'create payments',
            'update payments',
            // 'delete payments',
            // 'cancel payments',
            // 'approve payments',
            // 'decline payments',
            
            // 'manage roles',
            // 'manage permissions',
            
            // 'manage settings',
            // 'update settings',
            
            // 'create contractors',
            // 'approve contractors',
            // 'delete contractors',
            
            // 'create staff',
            // 'update staff',
            // 'disable staff',
            // 'view staff',
            'update password',
            'view records',
            
            'share file',
            'manage logs',
            'manage reports',
            'manage staff_reviews',
            'program of works',

            //contractor
            // 'manage account',
            // 'manage quote',
            // 'contractor dashboard'
        ];
        $level5->syncPermissions($permissions);
        
        //Contractor
        $level6 = Role::create([
            'name' => 'Level 6'
        ]);
        $permissions = [
            //admin
            // 'manage dashboard',
            
            // 'create batch',
            // 'delete batch',
            // 'view batch',
            
            // 'create categories',
            // 'delete categories',
            // 'view categories',
            
            // 'create warehouse',
            // 'update warehouse',
            // 'delete warehouse',
            // 'view warehouse',
            
            // 'create inventory',
            // 'update inventory',
            // 'delete inventory',
            // 'view inventory',
            
            // 'create inventory item',
            // 'update inventory item',
            // 'delete inventory item',
            // 'view inventory item',
            // 'release inventory item',
            
            // 'view projects',
            // 'create projects',
            // 'update projects',
            // 'terminate projects',
            // 'delete projects',
            // 'assign to projects',
            // 'complete projects',
            // 'generate project report',
            // 'print project report',
            // 'set project reminder',


            // 'view tasks',
            // 'create tasks',
            // 'update tasks',
            // 'terminate tasks',
            // 'delete tasks',
            // 'assign to tasks',
            // 'complete tasks',
            // 'generate task report',
            // 'print task report',
            // 'set task reminder',
            
            // 'view payments',
            // 'create payments',
            // 'update payments',
            // 'delete payments',
            // 'cancel payments',
            // 'approve payments',
            // 'decline payments',
            
            // 'manage roles',
            // 'manage permissions',
            
            // 'manage settings',
            // 'update settings',
            
            // 'create contractors',
            // 'approve contractors',
            // 'delete contractors',
            
            // 'create staff',
            // 'update staff',
            // 'disable staff',
            // 'view staff',
            // 'update password',
            // 'view records',
            
            // 'share file',
            // 'manage logs',
            // 'manage reports',
            // 'manage staff_reviews',
            // 'program of works',

            //contractor
            'manage account',
            'manage quote',
            'contractor dashboard'
        ];
        $level6->syncPermissions($permissions);

    }
}
