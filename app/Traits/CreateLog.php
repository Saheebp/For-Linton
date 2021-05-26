<?php

namespace App\Traits;

use App\Models\Log;
use Illuminate\Support\Facades\Hash;

trait CreateLog
{
    //
    function createLog(array $data)
    {
        $log = Log::create([
            'body' => $data['body'], 
            'project_id' => $data['project_id'],
            'task_id' => $data['task_id'],
            'sub_task_id' => $data['sub_task_id'],
            'user_id' => $data['user_id'],
        ]);
        return true;
    }
}