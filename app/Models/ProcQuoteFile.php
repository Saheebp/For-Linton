<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcQuoteFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 
        'name', 
        'type',  
        'proc_quote_id'
    ];

    public function request() {
        return $this->belongsTo(ProcQuote::class);
    }
}
