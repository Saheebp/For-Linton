<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class InventoryActivity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'quantity',
        'user_id',
        'receiver_id',
        'inventory_id',
        'inventory_item_id',
        'type'
    ];
    
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function inventoryItem()
    {
        return $this->belongsTo(InventoryItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class);
    }
}
