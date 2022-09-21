<?php

namespace App\Traits;

use App\Models\Message;
use App\Models\Notification;

use App\Models\Config;

use Carbon\Carbon;

trait AppConfig
{
    //check if there are new messages
    function newMessageCount()
    {
        $count = Message::where('reply','false')->where('receiver_id',auth()->user()->id)->get()->count();
        return $count; 
    }

    function newMessages()
    {
        //$messages = Message::where('receiver_id',Auth::user()->id)->get();
        $messages = Message::where('reply','false')->where('receiver_id',auth()->user()->id)->get();
        return $messages; 
    }

    //check if there are new notifications
    function newNotificationCount()
    {
        $count = Notification::where('reply','false')->where('user_id',auth()->user()->id)->get()->count();
        return $count; 
    }

    function newNotifications()
    {
        $messages = Notification::where('reply','false')->where('user_id',auth()->user()->id)->get();
        return $messages; 
    }
}