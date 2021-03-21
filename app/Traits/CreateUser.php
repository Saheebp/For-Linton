<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait CreateUser
{
    //
    function createCustomer(array $data)
    {
        $user = User::create([
            'name' => isset($data['name'])? $data['name'] : '', 
            'email' => $data['email'],
            'phone' => $data['phone'],

            // 'nok_name' => isset($data['nok_name'])? $data['nok_name'] : '', 
            // 'nok_phone' => isset($data['nok_phone'])? $data['nok_phone'] : '', 

            'is_admin' => 'false',
            'status_id' => 1,
            'password' => Hash::make($data['phone']),
        ]);
        
        $user->assignRole('Customer');
        return $user;
    }
}