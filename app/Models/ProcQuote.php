<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcQuote extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'address', 
        'description',
        
        'contractor_id',  
        'proc_request_id',
        'status_id'
    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function contractor() {
        return $this->belongsTo(User::class);
    }

    public function request() {
        return $this->belongsTo(ProcRequest::class);
    }

    public function files() {
        return $this->hasMany(ProcQuoteFile::class);
    }
}
