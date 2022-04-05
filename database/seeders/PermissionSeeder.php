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

        foreach ($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
    }
}
