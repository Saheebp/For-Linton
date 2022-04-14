<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        //'price',
        //'sales_price',
        'available_quantity',
        'threshold_quantity',
        'created_by',
        'batch_number',
        'image1',
        'image2',
        //'brand_id',
        //'type',
        //'group_id',
        'inventory_id',
        'category_id',
        'status_id',
        //'expiry_date',
        //'sales_price_percentage'
    ];
    
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
