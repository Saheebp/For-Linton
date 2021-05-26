<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 
        'name', 
        'type',  
        'proc_request_id',
        'proc_quote_id',
        'creator_id'

    ];

    public function request() {
        return $this->belongsTo(ProcRequest::class);
    }

    public function quote() {
        return $this->belongsTo(ProcQuote::class);
    }

    public function creator() {
        return $this->belongsTo(User::class);
    }
}
