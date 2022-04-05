<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'user_id'
    ];
    
    public function task() {
        return $this->belongsTo(Task::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
