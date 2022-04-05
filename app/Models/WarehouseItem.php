<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class WarehouseItem extends Model
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
        'warehouse_id',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function itemActivities(){
        return $this->hasMany(WarehouseActivity::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
