<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status_id' 
    ];

    public function items(){
        return $this->hasMany(inventoryItem::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
