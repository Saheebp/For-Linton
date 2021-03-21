<?php

namespace App\Traits;

use App\Models\Wallet;

trait Wallets
{
    function walletBalance($user_id)
    {
        $wallet_history = Wallet::where('user_id', $user_id)->get();
        
        if ($wallet_history == NULL) 
        {
            $wallet_balance = 0;
        }
        else
        {
            $wallet_balance = $wallet_history->sum('amount');
        }
        return $wallet_balance;
    }

    function creditWallet($user_id, $description, $amount)
    {

        Wallet::create([
            'user_id' => $user_id,
            'type' => 'Credit',
            'description' => $description,
            'amount' => $amount
        ]);
        
        return True;
    }

    function debitWallet($user_id, $description, $amount)
    {
        $wallet_balance = Wallet::where('user_id', $user_id)->get()->sum('amount');
        if ($wallet_balance <= 0) {
            return False;
        }

        Wallet::create([
            'user_id' => $user_id,
            'type' => 'Debit',
            'description' => $description,
            'amount' => -$amount
        ]);
        return True;
    }
}