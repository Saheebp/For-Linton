<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'quantity',
        'available',
        'threshold',
        'created_by',
        'batch_number',
        'image',
        'batch_id',
        'category_id',
        'status_id',
        'inventory_id',
        'warehouse_item_id'
    ];
    
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function warehouseItem()
    {
        return $this->belongsTo(WarehouseItem::class);
    }
    
    public function itemActivities(){
        return $this->hasMany(InventoryActivity::class);
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
