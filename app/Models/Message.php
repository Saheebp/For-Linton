<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'body',
        'read',
        'task_id',
        'creator_id',
        'receiver_id',
        'project_id',
        'sub_task_id',
        'grand_task_id',
        'great_task_id',
        'resource_id',
        'status_id'        
    ];

    
    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function subtask() {
        return $this->belongsTo(SubTask::class);
    }

    public function grandtask() {
        return $this->belongsTo(GrandTask::class);
    }

    public function greattask() {
        return $this->belongsTo(GreatTask::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function receiver() {
        return $this->belongsTo(User::class);
    }
    public function creator() {
        return $this->belongsTo(User::class);
    }
}
