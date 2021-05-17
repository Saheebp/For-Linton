<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractorRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'contractor_id', 
        'quote_request_id', 
        'status_id',
        'url',
    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function quoteRequests() {
        return $this->belongsTo(QuoteRequest::class);
    }

    public function contractor() {
        return $this->belongsTo(Contractor::class);
    }
}
