<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    //
    protected $fillable = [
        
        'user_id',
        'source',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
