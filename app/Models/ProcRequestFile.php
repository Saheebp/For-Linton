<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcRequestFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 
        'name', 
        'type',  
        'proc_request_id'
    ];

    public function request() {
        return $this->belongsTo(ProcRequest::class);
    }
}
