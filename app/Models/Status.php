<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'style',
    ];

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function project() {
        return $this->hasOne(Payment::class);
    }
    
    public function task() {
        return $this->hasOne(Order::class);
    }

    public function subtask() {
        return $this->hasOne(Order::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    
}
