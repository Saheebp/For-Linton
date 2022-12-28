<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestFqResource extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'url',
        'type', 
        'description',
        'request_fq_id',
        'user_id'
    ];

    public function resource() {
        return $this->belongsTo(ResourceFq::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
