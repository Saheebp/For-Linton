<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\Mail\SendMailable;
use App\Message;
use Mailgun\Mailgun;
use Carbon\Carbon;

trait SendSms
{
    function sendsms($receiver, $sender, $message)
    {
        try 
        {         
            if (app()->environment('production') || $this->smsStatus() == true)
            {
                $client = new \GuzzleHttp\Client();
                $username = env('NIG_BULK_SMS_USERNAME');
                $password = env('NIG_BULK_SMS_PASSWORD');
                $url = "https://portal.nigeriabulksms.com/api/?username=".$username."&password=".$password."&message=".$message."&sender=".$sender."&mobiles=".$receiver;
                
                $request = $client->post($url);
             }
            
        } catch (\Exception $e) {
            //dd($e);
        }
    }
}