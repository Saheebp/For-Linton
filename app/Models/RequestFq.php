<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestFq extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'subject', 
        'description',
        'start',
        'end',
        'total_cost',
        'user_id',  
        'status_id',  
        'department_id', 


    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function quotes() {
        return $this->hasMany(Quote::class);
    }

    public function resources() {
        return $this->hasMany(RequestFqResource::class);
    }
}
