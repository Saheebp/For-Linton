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
            'phone' => '10000000001',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $super->assignRole('SuperUser');

        $director = User::create([
            'name' => 'Panlu Manchan',
            'email' => 'md@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '10000000002',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $director->assignRole('Director');

        $manager1 = User::create([
            'name' => 'Pascal Edozie',
            'email' => 'cfo@lintonstarksmanager.com',
            'designation_id' => 2,
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '10000000003',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $manager1->assignRole('Account');

        $manager2 = User::create([
            'name' => 'Sowore Tolulope',
            'email' => 'pcm@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '20000000001',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $manager2->assignRole('Admin');

        $manager3 = User::create([
            'name' => 'Dele Farhan',
            'email' => 'po@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '20000000002',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $manager3->assignRole('Admin');

        $admin = User::create([
            'name' => 'Chima Emeka',
            'email' => 'pm@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '20000000003',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $admin->assignRole('Manager');

        $admin = User::create([
            'name' => 'Dauda Khalid',
            'email' => 'pm2@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '20000000004',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $admin->assignRole('Manager');

        $admin = User::create([
            'name' => 'John Johnson',
            'email' => 'pm3@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '20000000005',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $admin->assignRole('Manager');

        $agent = User::create([
            'name' => 'Ahmed Ibrahim',
            'email' => 'pe@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11, 
            'address' => '',
            'phone' => '20000000006',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $agent->assignRole('Manager');

        $agent = User::create([
            'name' => 'Lawal Malik',
            'email' => 'sm@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11, 
            'address' => '',
            'phone' => '20000000007',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $agent->assignRole('Agent');

        $agent = User::create([
            'name' => 'Quantity Surveyors',
            'email' => 'qs@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11, 
            'address' => '',
            'phone' => '20000000008',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $agent->assignRole('Agent');


        
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
