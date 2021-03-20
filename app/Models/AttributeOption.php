<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];
    
    public function products() {
        return $this->hasMany(Product::class);
    }

    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }
}
