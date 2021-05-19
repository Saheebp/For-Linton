<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'threshold',
        'created_by',
        'batch_number',
        'image',
        'batch_id',
        'category_id',
        'status_id',
        'inventory_id'
        //'expiry_date',
    ];
    
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

}
