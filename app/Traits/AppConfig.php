<?php

namespace App\Traits;

use App\Models\Config;

trait AppConfig
{
    function referralStatus()
    {
        $status = Config::where('tag','refstatus')->first()->value;
        return $status; 
    }

    function walletPaymentStatus()
    {
        $status = Config::where('tag','walletpay')->first()->value;
        return $status; 
    }

    function bookingCancellationTime()
    {
        $status = Config::where('tag','tbcancel')->first()->value;
        return $status; 
    }
}