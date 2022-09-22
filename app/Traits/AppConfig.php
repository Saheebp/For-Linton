<?php

namespace App\Traits;

use App\Models\Message;
use App\Models\Notification;

use App\Models\Config;

use Carbon\Carbon;
use Auth;

trait AppConfig
{
    //check if there are new messages
    function newMessageCount()
    {
        if (Auth::check()) {
            $count = Message::where('reply','false')->where('receiver_id',Auth::user()->id)->get()->count();
            return $count; 
        }else{
            return 0;
        }
        
    }

    function newMessages()
    {
        //$messages = Message::where('receiver_id',Auth::user()->id)->get();
        if (Auth::check()) {
            $messages = Message::where('reply','false')->where('receiver_id',Auth::user()->id)->get();
            return $messages;
        }else{
            $messages = new \Illuminate\Database\Eloquent\Collection;
        }
         
    }

    //check if there are new notifications
    function newNotificationCount()
    {
        if (Auth::check()) {
            $count = Notification::where('reply','false')->where('user_id',Auth::user()->id)->get()->count();
            return $count;
        }else{
            return 0;
        } 
    }

    function newNotifications()
    {
        if (Auth::check()) {
            $notifications = Notification::where('reply','false')->where('user_id',Auth::user()->id)->get();
            return $notifications;
        }else{
            $notifications = new \Illuminate\Database\Eloquent\Collection;
        }
         
    }
}