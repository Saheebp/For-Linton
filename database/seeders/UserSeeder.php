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
            //'email' => 'super@poaadit.com',
            'email' => 'kingsleyibe09@gmail.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '10000000001',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $super->assignRole('Super User');

        $super = User::create([
            'name' => 'Nasiru Sadiq',
            //'email' => 'nasirusadiq071@gmail.com',
            'email' => 'ibennamdik@gmail.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '10000000001',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $super->assignRole('Super User');

        $manager = User::create([
            'name' => 'Bode Gbolade',
            //'email' => 'bodegbolade@poaadit.com',
            'email' => 'endee09@gmail.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '10000000002',
            'is_admin' => 'true',
            'designation_id' => 1
        ]);
        $manager->assignRole('Level 1');

        $hr = User::create([
            'name' => 'HR',
            'email' => 'dev.lintonstarks@gmail.com',
            //'email' => 'info@poaadit.com',
            'designation_id' => 2,
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '10000000003',
            'is_admin' => 'true',
            'designation_id' => 2
        ]);
        $hr->assignRole('Level 2');

        $qs = User::create([
            'name' => 'Lyd',
            'email' => 'lydnangoka@poaadit.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '20000000001',
            'is_admin' => 'true',
            'designation_id' => 5
        ]);
        $qs->assignRole('Level 3');

        $assarch = User::create([
            'name' => 'Tosin Owoyemi',
            //'email' => 'tosinowoyemi@poaadit.com',
            'email' => 'gnorizon@gmail.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '20000000002',
            'is_admin' => 'true',
            'designation_id' => 4
        ]);
        $assarch->assignRole('Level 4');

        $assarch = User::create([
            'name' => 'Damilola Ojo',
            //'email' => 'damilolaojo@poaadit.com',
            'email' => 'gnorizonconsults@gmail.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '20000000002',
            'is_admin' => 'true',
            'designation_id' => 4
        ]);
        $assarch->assignRole('Level 4');

        $acct = User::create([
            'name' => 'Daniel Salami',
            'email' => 'daniel.salami@poaadit.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '20000000003',
            'is_admin' => 'true',
            'designation_id' => 6
        ]);
        $acct->assignRole('Level 5');

        $engr = User::create([
            'name' => 'afoketialobi',
            'email' => 'afoketialobi@poaadit.com',
            'password' => Hash::make('12345678'),
            'status_id' => 11,  
            'address' => '',
            'phone' => '20000000004',
            'is_admin' => 'true',
            'designation_id' => 7
        ]);
        $engr->assignRole('Level 3');

        $contractor = User::create([
            'name' => 'Nnamdi Ibe',
            'email' => 'endee109@gmail.com',
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
        $contractor->assignRole('Level 6');

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
        $contractor->assignRole('Level 6');
    }
}