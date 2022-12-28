<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description',
        'status_id'
    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function task() {
        return $this->hasMany(Task::class);
    }
}
