<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'user_id',  
        'request_fq_id',
        'status_id',
        'approval_status',
        'total_cost'
    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function requestFq() {
        return $this->belongsTo(RequestFq::class);
    }
    
    public function resources() {
        return $this->hasMany(QuoteResource::class);
    }
}
