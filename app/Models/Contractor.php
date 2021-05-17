<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone', 
        'address', 
        'avatar', 
        'status_id', 
        'profile_update_status'
    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function requests() {
        return $this->belongsTo(ContractorRequest::class);
    }
}
