<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'email', 
        'transaction_ref', 
        'amount', 
        'status_id', 
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function project() {
        return $this->hasOne(Project::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
