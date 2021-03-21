<?php

namespace App\Traits;

use App\Models\Status;
use App\Models\Config;

trait AppStatus
{
    function returnStatusId($status)
    {
        try {
            $status_id = Status::where('name',$status)->first()->id;
            return $status_id; 
        } catch (\Throwable $th) {
            //throw $th;
        }        
    }
}
