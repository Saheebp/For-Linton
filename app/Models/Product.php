<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    //

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'rating',
        'image1',
        'image2',
        'quantity',
        'amount',
        'visibility',
        'orders_count',
        
        'category_id',
        'brand_id',
        'option_id',
        'status_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function orderItem() {
        return $this->hasOne(OrderItem::class);
    }
    
    public function option() {
        return $this->hasMany(AttributeOption::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}