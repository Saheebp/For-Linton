<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'status_id',
        'address',
        'state',
        'lga',
        'address'

    ];

    public function items(){
        return $this->hasMany(Item::class);
    }
    
    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }
}
