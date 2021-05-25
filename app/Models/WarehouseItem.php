<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseItem extends Model
{
    use HasFactory;

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
        //'expiry_date',
    ];
    
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
