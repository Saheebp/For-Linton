<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'purpose',
        'user_id',
        'status_id',
        'inventory_id',
        'inventory_item_id',
    ];
    
    public function inventoryItem()
    {
        return $this->belongsTo(InventoryItem::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status() 
    {
        return $this->belongsTo(Status::class);
    }
}
