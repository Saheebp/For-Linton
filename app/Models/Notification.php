<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'tag',

        'project_id',
        'task_id',
        'sub_task_id',
        'resource_id',
        'proc_request_id',
        'proc_quote_id',
        'payment_id',

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

    public function creator() {
        return $this->belongsTo(User::class);
    }
}
