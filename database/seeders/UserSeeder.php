<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        $super = User::create([
            'name' => 'Super User',
            'email' => 'super@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '00000000001',
            'is_admin' => 'true',
            'order_count' => 0
        ]);
        $super->assignRole('SuperUser');

        $director = User::create([
            'name' => 'Director',
            'email' => 'director@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '00000000002',
            'is_admin' => 'true',
            'order_count' => 0
        ]);
        $director->assignRole('Director');

        $manager1 = User::create([
            'name' => 'Manager1',
            'email' => 'manager1@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '10000000003',
            'is_admin' => 'true',
            'order_count' => 0
        ]);
        $manager1->assignRole('Manager');

        $manager2 = User::create([
            'name' => 'Manager2',
            'email' => 'manager2@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '20000000003',
            'is_admin' => 'true',
            'order_count' => 0
        ]);
        $manager2->assignRole('Manager');

        $manager3 = User::create([
            'name' => 'Manager3',
            'email' => 'manager3@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '10000000003',
            'is_admin' => 'true',
            'order_count' => 0
        ]);
        $manager3->assignRole('Manager');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '00000000003',
            'is_admin' => 'true',
            'order_count' => 0
        ]);
        $admin->assignRole('Admin');

        $agent = User::create([
            'name' => 'Account',
            'email' => 'account@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11, 
            'address' => '',
            'phone' => '00000000004',
            'is_admin' => 'true',
            'order_count' => 0
        ]);
        $agent->assignRole('Account');

        // $agent = User::create([
        //     'name' => 'Agent',
        //     'email' => 'agent@lintonstarksmanager.com',
        //     'password' => Hash::make('12345678'),
        //     'status_id' => 11, 
        //     'address' => '',
        //     'phone' => '00000000004',
        //     'is_admin' => 'true',
        //     'order_count' => 0
        // ]);
        // $agent->assignRole('Agent');

        // $customer = User::create([
        //     'name' => 'Nnamdi Ibe',
        //     'email' => 'endee09@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'phone' =>'00000000005',
        //     'address' => 'Zaramaganda rayfield rd',
        //     'status_id' => 7,
        //     'is_admin' => 'false',
        //     'order_count' => 0
        // ]);
        // $customer->assignRole('Customer');
    }
}
