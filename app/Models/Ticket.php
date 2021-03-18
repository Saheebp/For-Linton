<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', 
        'subject', 
        'body', 
        'status_id', 
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function order() {
        return $this->hasOne(Order::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
