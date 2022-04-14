<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'address',
        'state',
        'lga',
        'address',

        'project_id',
    ];

    public function items(){
        return $this->hasMany(InventoryItem::class);
    }

    public function itemActivities(){
        return $this->hasMany(InventoryActivity::class);
    }
    
    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
