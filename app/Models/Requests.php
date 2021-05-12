<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'item_id',
        'quantity', 
        'creator_id',  
        'status_id'
    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function creator() {
        return $this->belongsTo(User::class);
    }
}
