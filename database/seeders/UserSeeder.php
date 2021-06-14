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
        $super->assignRole('Level 1');

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
        $director->assignRole('Level 2');

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
        $manager1->assignRole('Level 4');

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
        $manager2->assignRole('Level 3');

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
        $manager3->assignRole('Level 3');

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
        $admin->assignRole('Level 3');

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
        $admin->assignRole('Level 3');

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
        $admin->assignRole('Level 3');

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
        $agent->assignRole('Level 3');

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
        $agent->assignRole('Level 5');

        $agent = User::create([
            'name' => 'Bidemi Saheed',
            'email' => 'qs@lintonstarksmanager.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11, 
            'address' => '',
            'phone' => '20000000008',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $agent->assignRole('Level 6');


        
        $contractor = User::create([
            'name' => 'Nnamdi Ibe',
            'email' => 'endee09@gmail.com',
            'password' => Hash::make('123456'),
            'phone' =>'00000000005',
            'address' => 'Zaramaganda rayfield rd',
            'status_id' => 16,
            'is_admin' => 'false',
            'is_contractor' => 'true',
            'designation_id' => NULL,

            'org_name' => 'Gnorizon', 
            'org_email' => 'gnorizon@gmail.com',
            'org_phone' => '08090590166',
            'org_address' => 'Old Airport Jos',
        ]);
        $contractor->assignRole('Level 7');

        $contractor = User::create([
            'name' => 'Oscar Osas',
            'email' => 'oscar@gmail.com',
            'password' => Hash::make('123456'),
            'phone' =>'00000000006',
            'address' => 'Secretarite rayfield rd',
            'status_id' => 16,
            'is_admin' => 'false',
            'is_contractor' => 'true',
            'designation_id' => NULL,

            'org_name' => 'Splufic and More', 
            'org_email' => 'splufic@gmail.com',
            'org_phone' => '08090099900',
            'org_address' => 'Main Airport Jos',
        ]);
        $contractor->assignRole('Level 7');
    }
}
