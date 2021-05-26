<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcContractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'proc_request_id',
        'contractor_id'
        
    ];
    
    public function contractor() {
        return $this->belongsTo(User::class);
    }

    public function procRequest() {
        return $this->belongsTo(ProcRequest::class);
    }
}
