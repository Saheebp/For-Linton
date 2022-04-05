<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTaskMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_task_id',
        'user_id'
    ];
    
    public function subtask() {
        return $this->belongsTo(SubTask::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
