<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'url',
        'type', 
        'description', 

        'project_id',
        'task_id',  
        'creator',  
        'status_id'
    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function process() {
        return $this->belongsTo(Process::class);
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