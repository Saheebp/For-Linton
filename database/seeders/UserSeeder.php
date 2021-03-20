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
            'email' => 'super@jsag.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '00000000001',
            'is_admin' => 'true'
        ]);
        $super->assignRole('Super');

        $director = User::create([
            'name' => 'Director',
            'email' => 'director@jsag.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '00000000002',
            'is_admin' => 'true'
        ]);
        $director->assignRole('Director');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@jsag.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '00000000003',
            'is_admin' => 'true'
        ]);
        $admin->assignRole('Admin');

        $agent = User::create([
            'name' => 'Agent',
            'email' => 'agent@jsag.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11, 
            'address' => '',
            'phone' => '00000000004',
            'is_admin' => 'true'
        ]);
        $agent->assignRole('Agent');

        $customer = User::create([
            'name' => 'Nnamdi Ibe',
            'email' => 'endee09@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' =>'00000000005',
            'address' => 'Zaramaganda rayfield rd',
            'status_id' => 7,
            'is_admin' => 'false'
        ]);
        $customer->assignRole('Customer');
    }
}
