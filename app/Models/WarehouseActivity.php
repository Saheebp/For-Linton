<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'user_id',
        'project',
        'project_id',
        'warehouse_id',
        'warehouse_item_id',
        'type'
    ];
    
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function warehouseItem()
    {
        return $this->belongsTo(WarehouseItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
