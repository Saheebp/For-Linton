<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'url',
        'type', 
        'description',
        'quote_id'
    ];

    public function quote() {
        return $this->belongsTo(Quote::class);
    }
}
