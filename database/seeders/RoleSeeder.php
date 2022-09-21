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
            
            'batch.menu',
            'batch.create',
            'batch.delete',
            'batch.view',
            
            'categories.menu',
            'categories.create',
            'categories.delete',
            'categories.view',
            
            'warehouse.menu',
            'warehouse.create',
            'warehouse.update',
            'warehouse.delete',
            'warehouse.view',
            
            'inventory.menu',
            'inventory.create',
            'inventory.update',
            'inventory.delete',
            'inventory.view',
            
            'inventory.item.create',
            'inventory.item.update',
            'inventory.item.delete',
            'inventory.item.view',
            'inventory.item.release',
            'inventory.item.request',
            'inventory.item.return',
            'inventory.item.disburse',
            'inventory.item.history',
            
            'projects.menu',
            'projects.activity',
            'projects.budget',
            'projects.comments',
            'projects.inventory',
            'projects.notifications',
            'projects.resources',
            'projects.team',
            'projects.timeline',
            
            'projects.view',
            'projects.create',
            'projects.update',
            'projects.terminate',
            'projects.delete',

            'projects.team.addremove',
            'projects.team.message',
            'projects.team.role',
            
            'projects.assign',
            'projects.complete',
            'projects.comment',
            'projects.generate.report',
            'projects.print.report',
            'projects.set.reminder',

            'projects.resource.create',
            'projects.resource.delete',
            'projects.resource.download',
            
            'projects.cost.create',
            'projects.cost.delete',
            
            'tasks.menu',
            'tasks.view',
            'tasks.create',
            'tasks.update',
            'tasks.terminate',
            'tasks.delete',
            'tasks.assign',
            'tasks.complete',
            'tasks.comment',
            'tasks.generate.report',
            'tasks.print.report',
            'tasks.set.reminder',

            'tasks.resource.create',
            'tasks.resource.delete',
            'tasks.resource.download',

            'tasks.team.addremove',
            'tasks.team.message',
            'tasks.team.role',
            
            'payments.menu',
            'payments.view',
            'payments.create',
            'payments.update',
            'payments.delete',
            'payments.cancel',
            'payments.approve',
            'payments.decline',
            
            'roles.menu',
            'roles.manage',

            'permissions.menu',
            'permissions.manage',
            
            'settings.menu',
            'settings.manage',
            'settings.update',

            'messaging.menu',
            'messaging.send',
            'messaging.update',
            'messaging.delete',
            
            //'procurement.menu',
            
            'contractors.menu',
            'contractors.create',
            'contractors.approve',
            'contractors.delete',
            
            'staff.menu',
            'staff.create',
            'staff.update',
            'staff.disable',
            'staff.view',
            'staff.update.password',
            'staff.view.records',
            
            'file.share',

            'logs.menu',
            'logs.manage',

            'reports.menu',
            'reports.manage',

            'reviews.manage',
            'programofworks.manage',

            //contractor
            'account.manage',
            'quote.manage',
            'contractor.dashboard'
        ];
        $super->syncPermissions($permissions);


        //Director
        $level1 = Role::create([
            'name' => 'Level 1'
        ]);
        $permissions = [

            //admin
            'manage dashboard',
            
            'batch.menu',
            'batch.create',
            'batch.delete',
            'batch.view',
            
            'categories.menu',
            'categories.create',
            'categories.delete',
            'categories.view',
            
            'warehouse.menu',
            'warehouse.create',
            'warehouse.update',
            'warehouse.delete',
            'warehouse.view',
            
            'inventory.menu',
            'inventory.create',
            'inventory.update',
            'inventory.delete',
            'inventory.view',
            
            'inventory.item.create',
            'inventory.item.update',
            'inventory.item.delete',
            'inventory.item.view',
            'inventory.item.release',
            'inventory.item.request',
            'inventory.item.return',
            'inventory.item.disburse',
            'inventory.item.history',
            
            'projects.menu',
            'projects.activity',
            'projects.budget',
            'projects.comments',
            'projects.inventory',
            'projects.notifications',
            'projects.resources',
            'projects.team',
            'projects.timeline',
            
            'projects.view',
            'projects.create',
            'projects.update',
            'projects.terminate',
            'projects.delete',

            'projects.team.addremove',
            'projects.team.message',
            'projects.team.role',
            
            'projects.assign',
            'projects.complete',
            'projects.comment',
            'projects.generate.report',
            'projects.print.report',
            'projects.set.reminder',

            'projects.resource.create',
            'projects.resource.delete',
            'projects.resource.download',
            
            'projects.cost.create',
            'projects.cost.delete',
            
            'tasks.menu',
            'tasks.view',
            'tasks.create',
            'tasks.update',
            'tasks.terminate',
            'tasks.delete',
            'tasks.assign',
            'tasks.complete',
            'tasks.comment',
            'tasks.generate.report',
            'tasks.print.report',
            'tasks.set.reminder',

            'tasks.resource.create',
            'tasks.resource.delete',
            'tasks.resource.download',

            'tasks.team.addremove',
            'tasks.team.message',
            'tasks.team.role',
            
            'payments.menu',
            'payments.view',
            'payments.create',
            'payments.update',
            'payments.delete',
            'payments.cancel',
            'payments.approve',
            'payments.decline',
            
            // 'roles.menu',
            // 'roles.manage',

            'permissions.menu',
            'permissions.manage',
            
            // 'settings.menu',
            // 'settings.manage',
            // 'settings.update',

            'messaging.menu',
            'messaging.send',
            'messaging.update',
            'messaging.delete',
            
            //'procurement.menu',
            
            'contractors.menu',
            'contractors.create',
            'contractors.approve',
            'contractors.delete',
            
            'staff.menu',
            'staff.create',
            'staff.update',
            'staff.disable',
            'staff.view',
            'staff.update.password',
            'staff.view.records',
            
            'file.share',

            // 'logs.menu',
            // 'logs.manage',

            'reports.menu',
            'reports.manage',

            'reviews.manage',
            'programofworks.manage',

            //contractor
            // 'account.manage',
            // 'quote.manage',
            // 'contractor.dashboard'
        ];
        $level1->syncPermissions($permissions);


        //Admin
        $level2 = Role::create([
            'name' => 'Level 2'
        ]);
        $permissions = [
            //admin
            'manage dashboard',
            
            'batch.menu',
            'batch.create',
            // 'batch.delete',
            'batch.view',
            
            // 'categories.menu',
            // 'categories.create',
            // 'categories.delete',
            'categories.view',
            
            'warehouse.menu',
            // 'warehouse.create',
            'warehouse.update',
            //'warehouse.delete',
            'warehouse.view',
            
            'inventory.menu',
            'inventory.create',
            'inventory.update',
            //'inventory.delete',
            'inventory.view',
            
            'inventory.item.create',
            'inventory.item.update',
            'inventory.item.delete',
            'inventory.item.view',
            // 'inventory.item.release',
            'inventory.item.request',
            // 'inventory.item.return',
            // 'inventory.item.disburse',
            'inventory.item.history',
            
            'projects.menu',
            'projects.activity',
            'projects.budget',
            'projects.comments',
            'projects.inventory',
            'projects.notifications',
            'projects.resources',
            'projects.team',
            'projects.timeline',
            
            'projects.view',
            // 'projects.create',
            'projects.update',
            // 'projects.terminate',
            // 'projects.delete',

            // 'projects.team.addremove',
            'projects.team.message',
            // 'projects.team.role',
            
            //'projects.assign',
            'projects.complete',
            'projects.comment',
            // 'projects.generate.report',
            // 'projects.print.report',
            // 'projects.set.reminder',

            'projects.resource.create',
            'projects.resource.delete',
            'projects.resource.download',
            
            // 'projects.cost.create',
            // 'projects.cost.delete',
            
            'tasks.menu',
            'tasks.view',
            'tasks.create',
            'tasks.update',
            'tasks.terminate',
            'tasks.delete',
            'tasks.assign',
            'tasks.complete',
            'tasks.comment',
            // 'tasks.generate.report',
            // 'tasks.print.report',
            'tasks.set.reminder',

            'tasks.resource.create',
            'tasks.resource.delete',
            'tasks.resource.download',

            'tasks.team.addremove',
            'tasks.team.message',
            'tasks.team.role',
            
            'payments.menu',
            'payments.view',
            'payments.create',
            'payments.update',
            // 'payments.delete',
            // 'payments.cancel',
            // 'payments.approve',
            // 'payments.decline',
            
            // 'roles.menu',
            // 'roles.manage',

            // 'permissions.menu',
            // 'permissions.manage',
            
            // 'settings.menu',
            // 'settings.manage',
            // 'settings.update',

            'messaging.menu',
            'messaging.send',
            'messaging.update',
            'messaging.delete',
            
            //'procurement.menu',
            
            'contractors.menu',
            'contractors.create',
            // 'contractors.approve',
            // 'contractors.delete',
            
            // 'staff.menu',
            // 'staff.create',
            // 'staff.update',
            // 'staff.disable',
            // 'staff.view',
            // 'staff.update.password',
            // 'staff.view.records',
            
            'file.share',

            // 'logs.menu',
            // 'logs.manage',

            // 'reports.menu',
            // 'reports.manage',

            // 'reviews.manage',
            // 'programofworks.manage',

            //contractor
            // 'account.manage',
            // 'quote.manage',
            // 'contractor.dashboard'
        ];
        $level2->syncPermissions($permissions);


        //Manager
        $level3 = Role::create([
            'name' => 'Level 3'
        ]);
        $permissions = [
            //admin
            'manage dashboard',
            
            //'batch.menu',
            //'batch.create',
            // 'batch.delete',
            //'batch.view',
            
            // 'categories.menu',
            // 'categories.create',
            // 'categories.delete',
            'categories.view',
            
            'warehouse.menu',
            // 'warehouse.create',
            'warehouse.update',
            //'warehouse.delete',
            'warehouse.view',
            
            'inventory.menu',
            'inventory.create',
            'inventory.update',
            //'inventory.delete',
            'inventory.view',
            
            // 'inventory.item.create',
            // 'inventory.item.update',
            // 'inventory.item.delete',
            'inventory.item.view',
            // 'inventory.item.release',
            'inventory.item.request',
            // 'inventory.item.return',
            // 'inventory.item.disburse',
            'inventory.item.history',
            
            'projects.menu',
            'projects.activity',
            'projects.budget',
            'projects.comments',
            'projects.inventory',
            'projects.notifications',
            'projects.resources',
            'projects.team',
            'projects.timeline',
            
            'projects.view',
            // 'projects.create',
            'projects.update',
            // 'projects.terminate',
            // 'projects.delete',

            // 'projects.team.addremove',
            //'projects.team.message',
            // 'projects.team.role',
            
            //'projects.assign',
            'projects.complete',
            'projects.comment',
            // 'projects.generate.report',
            // 'projects.print.report',
            // 'projects.set.reminder',

            //'projects.resource.create',
            //'projects.resource.delete',
            'projects.resource.download',
            
            // 'projects.cost.create',
            // 'projects.cost.delete',
            
            'tasks.menu',
            'tasks.view',
            // 'tasks.create',
            // 'tasks.update',
            // 'tasks.terminate',
            // 'tasks.delete',
            // 'tasks.assign',
            // 'tasks.complete',
            'tasks.comment',
            // 'tasks.generate.report',
            // 'tasks.print.report',
            'tasks.set.reminder',

            // 'tasks.resource.create',
            // 'tasks.resource.delete',
            // 'tasks.resource.download',

            //'tasks.team.addremove',
            'tasks.team.message',
            //'tasks.team.role',
            
            'payments.menu',
            'payments.view',
            // 'payments.create',
            // 'payments.update',
            // 'payments.delete',
            // 'payments.cancel',
            // 'payments.approve',
            // 'payments.decline',
            
            // 'roles.menu',
            // 'roles.manage',

            // 'permissions.menu',
            // 'permissions.manage',
            
            // 'settings.menu',
            // 'settings.manage',
            // 'settings.update',

            'messaging.menu',
            'messaging.send',
            'messaging.update',
            'messaging.delete',
            
            //'procurement.menu',
            
            // 'contractors.menu',
            // 'contractors.create',
            // 'contractors.approve',
            // 'contractors.delete',
            
            // 'staff.menu',
            // 'staff.create',
            // 'staff.update',
            // 'staff.disable',
            // 'staff.view',
            // 'staff.update.password',
            // 'staff.view.records',
            
            'file.share',

            // 'logs.menu',
            // 'logs.manage',

            // 'reports.menu',
            // 'reports.manage',

            // 'reviews.manage',
            // 'programofworks.manage',

            //contractor
            // 'account.manage',
            // 'quote.manage',
            // 'contractor.dashboard'
        ];
        $level3->syncPermissions($permissions);


        //Account
        $level4 = Role::create([
            'name' => 'Level 4'
        ]);
        $permissions = [
            //admin
            'manage dashboard',
            
            //'batch.menu',
            //'batch.create',
            // 'batch.delete',
            //'batch.view',
            
            // 'categories.menu',
            // 'categories.create',
            // 'categories.delete',
            'categories.view',
            
            'warehouse.menu',
            // 'warehouse.create',
            'warehouse.update',
            //'warehouse.delete',
            'warehouse.view',
            
            'inventory.menu',
            'inventory.create',
            'inventory.update',
            //'inventory.delete',
            'inventory.view',
            
            // 'inventory.item.create',
            // 'inventory.item.update',
            // 'inventory.item.delete',
            'inventory.item.view',
            // 'inventory.item.release',
            'inventory.item.request',
            // 'inventory.item.return',
            // 'inventory.item.disburse',
            'inventory.item.history',
            
            'projects.menu',
            'projects.activity',
            'projects.budget',
            'projects.comments',
            'projects.inventory',
            'projects.notifications',
            'projects.resources',
            'projects.team',
            'projects.timeline',
            
            'projects.view',
            // 'projects.create',
            'projects.update',
            // 'projects.terminate',
            // 'projects.delete',

            // 'projects.team.addremove',
            //'projects.team.message',
            // 'projects.team.role',
            
            //'projects.assign',
            'projects.complete',
            'projects.comment',
            // 'projects.generate.report',
            // 'projects.print.report',
            // 'projects.set.reminder',

            //'projects.resource.create',
            //'projects.resource.delete',
            'projects.resource.download',
            
            // 'projects.cost.create',
            // 'projects.cost.delete',
            
            'tasks.menu',
            'tasks.view',
            // 'tasks.create',
            // 'tasks.update',
            // 'tasks.terminate',
            // 'tasks.delete',
            // 'tasks.assign',
            // 'tasks.complete',
            'tasks.comment',
            // 'tasks.generate.report',
            // 'tasks.print.report',
            'tasks.set.reminder',

            // 'tasks.resource.create',
            // 'tasks.resource.delete',
            // 'tasks.resource.download',

            // 'tasks.team.addremove',
            // 'tasks.team.message',
            // 'tasks.team.role',
            
            'payments.menu',
            'payments.view',
            // 'payments.create',
            // 'payments.update',
            // 'payments.delete',
            // 'payments.cancel',
            // 'payments.approve',
            // 'payments.decline',
            
            // 'roles.menu',
            // 'roles.manage',

            // 'permissions.menu',
            // 'permissions.manage',
            
            // 'settings.menu',
            // 'settings.manage',
            // 'settings.update',

            'messaging.menu',
            'messaging.send',
            'messaging.update',
            'messaging.delete',
            
            //'procurement.menu',
            
            // 'contractors.menu',
            // 'contractors.create',
            // 'contractors.approve',
            // 'contractors.delete',
            
            // 'staff.menu',
            // 'staff.create',
            // 'staff.update',
            // 'staff.disable',
            // 'staff.view',
            // 'staff.update.password',
            // 'staff.view.records',
            
            'file.share',

            // 'logs.menu',
            // 'logs.manage',

            // 'reports.menu',
            // 'reports.manage',

            // 'reviews.manage',
            // 'programofworks.manage',

            //contractor
            // 'account.manage',
            // 'quote.manage',
            // 'contractor.dashboard'
        ];
        $level4->syncPermissions($permissions);


        //Officers
        $level5 = Role::create([
            'name' => 'Level 5'
        ]);
        $permissions = [
            //admin
            'manage dashboard',
            
            //'batch.menu',
            //'batch.create',
            // 'batch.delete',
            //'batch.view',
            
            // 'categories.menu',
            // 'categories.create',
            // 'categories.delete',
            'categories.view',
            
            'warehouse.menu',
            // 'warehouse.create',
            'warehouse.update',
            //'warehouse.delete',
            'warehouse.view',
            
            'inventory.menu',
            'inventory.create',
            'inventory.update',
            //'inventory.delete',
            'inventory.view',
            
            // 'inventory.item.create',
            // 'inventory.item.update',
            // 'inventory.item.delete',
            'inventory.item.view',
            // 'inventory.item.release',
            'inventory.item.request',
            // 'inventory.item.return',
            // 'inventory.item.disburse',
            'inventory.item.history',
            
            'projects.menu',
            'projects.activity',
            //'projects.budget',
            'projects.comments',
            'projects.inventory',
            'projects.notifications',
            'projects.resources',
            'projects.team',
            'projects.timeline',
            
            'projects.view',
            // 'projects.create',
            'projects.update',
            // 'projects.terminate',
            // 'projects.delete',

            // 'projects.team.addremove',
            //'projects.team.message',
            // 'projects.team.role',
            
            //'projects.assign',
            'projects.complete',
            'projects.comment',
            // 'projects.generate.report',
            // 'projects.print.report',
            // 'projects.set.reminder',

            //'projects.resource.create',
            //'projects.resource.delete',
            'projects.resource.download',
            
            // 'projects.cost.create',
            // 'projects.cost.delete',
            
            'tasks.menu',
            'tasks.view',
            // 'tasks.create',
            // 'tasks.update',
            // 'tasks.terminate',
            // 'tasks.delete',
            // 'tasks.assign',
            // 'tasks.complete',
            'tasks.comment',
            // 'tasks.generate.report',
            // 'tasks.print.report',
            'tasks.set.reminder',

            // 'tasks.resource.create',
            // 'tasks.resource.delete',
            // 'tasks.resource.download',

            // 'tasks.team.addremove',
            // 'tasks.team.message',
            // 'tasks.team.role',
            
            // 'payments.menu',
            // 'payments.view',
            // 'payments.create',
            // 'payments.update',
            // 'payments.delete',
            // 'payments.cancel',
            // 'payments.approve',
            // 'payments.decline',
            
            // 'roles.menu',
            // 'roles.manage',

            // 'permissions.menu',
            // 'permissions.manage',
            
            // 'settings.menu',
            // 'settings.manage',
            // 'settings.update',

            'messaging.menu',
            'messaging.send',
            'messaging.update',
            'messaging.delete',
            
            //'procurement.menu',
            
            // 'contractors.menu',
            // 'contractors.create',
            // 'contractors.approve',
            // 'contractors.delete',
            
            // 'staff.menu',
            // 'staff.create',
            // 'staff.update',
            // 'staff.disable',
            // 'staff.view',
            // 'staff.update.password',
            // 'staff.view.records',
            
            'file.share',

            // 'logs.menu',
            // 'logs.manage',

            // 'reports.menu',
            // 'reports.manage',

            // 'reviews.manage',
            // 'programofworks.manage',

            //contractor
            // 'account.manage',
            // 'quote.manage',
            // 'contractor.dashboard'
        ];
        $level5->syncPermissions($permissions);
        
        //Contractor
        $level6 = Role::create([
            'name' => 'Level 6'
        ]);
        $permissions = [
            //admin
            //'manage dashboard',
            
            //'batch.menu',
            //'batch.create',
            // 'batch.delete',
            //'batch.view',
            
            // 'categories.menu',
            // 'categories.create',
            // 'categories.delete',
            //'categories.view',
            
            //'warehouse.menu',
            // 'warehouse.create',
            //'warehouse.update',
            //'warehouse.delete',
            //'warehouse.view',
            
            // 'inventory.menu',
            // 'inventory.create',
            // 'inventory.update',
            //'inventory.delete',
            //'inventory.view',
            
            // 'inventory.item.create',
            // 'inventory.item.update',
            // 'inventory.item.delete',
            //'inventory.item.view',
            // 'inventory.item.release',
            //'inventory.item.request',
            // 'inventory.item.return',
            // 'inventory.item.disburse',
            //'inventory.item.history',
            
            // 'projects.menu',
            // 'projects.activity',
            //'projects.budget',
            // 'projects.comments',
            // 'projects.inventory',
            // 'projects.notifications',
            // 'projects.resources',
            // 'projects.team',
            // 'projects.timeline',
            
            //'projects.view',
            // 'projects.create',
            //'projects.update',
            // 'projects.terminate',
            // 'projects.delete',

            // 'projects.team.addremove',
            //'projects.team.message',
            // 'projects.team.role',
            
            //'projects.assign',
            // 'projects.complete',
            // 'projects.comment',
            // 'projects.generate.report',
            // 'projects.print.report',
            // 'projects.set.reminder',

            //'projects.resource.create',
            //'projects.resource.delete',
            //'projects.resource.download',
            
            // 'projects.cost.create',
            // 'projects.cost.delete',
            
            // 'tasks.menu',
            // 'tasks.view',
            // 'tasks.create',
            // 'tasks.update',
            // 'tasks.terminate',
            // 'tasks.delete',
            // 'tasks.assign',
            // 'tasks.complete',
            //'tasks.comment',
            // 'tasks.generate.report',
            // 'tasks.print.report',
            //'tasks.set.reminder',

            // 'tasks.resource.create',
            // 'tasks.resource.delete',
            // 'tasks.resource.download',

            // 'tasks.team.addremove',
            // 'tasks.team.message',
            // 'tasks.team.role',
            
            // 'payments.menu',
            // 'payments.view',
            // 'payments.create',
            // 'payments.update',
            // 'payments.delete',
            // 'payments.cancel',
            // 'payments.approve',
            // 'payments.decline',
            
            // 'roles.menu',
            // 'roles.manage',

            // 'permissions.menu',
            // 'permissions.manage',
            
            // 'settings.menu',
            // 'settings.manage',
            // 'settings.update',

            // 'messaging.menu',
            // 'messaging.send',
            // 'messaging.update',
            // 'messaging.delete',
            
            //'procurement.menu',
            
            // 'contractors.menu',
            // 'contractors.create',
            // 'contractors.approve',
            // 'contractors.delete',
            
            // 'staff.menu',
            // 'staff.create',
            // 'staff.update',
            // 'staff.disable',
            // 'staff.view',
            // 'staff.update.password',
            // 'staff.view.records',
            
            // 'file.share',

            // 'logs.menu',
            // 'logs.manage',

            // 'reports.menu',
            // 'reports.manage',

            // 'reviews.manage',
            // 'programofworks.manage',

            //contractor
            'account.manage',
            'quote.manage',
            'contractor.dashboard'
        ];
        $level6->syncPermissions($permissions);

    }
}
