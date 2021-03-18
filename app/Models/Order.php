<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'status_id',
        'payment_id', 
        'delivery_method', 
        'comment', 
        'delivery_cost'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function product() {
        return $this->hasManyThrough(OrderItem::class, Product::class);
    }
}
