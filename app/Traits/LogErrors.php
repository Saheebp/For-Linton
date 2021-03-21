<?php

namespace App\Traits;

use App\Models\Error;

trait LogErrors
{
    //
    function createErrorReport($user_id, $source, $description)
    {
        Error::create([
            'source' => $source,
            'user_id' => $user_id,
            'description' => $description,
        ]);      
    }
}