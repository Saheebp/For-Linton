<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'order',
        'description', 
        'budget', 
        'actual_cost',
        
        'start', 
        'end', 
        
        'executor_id',  
        'project_id',
        'group_id',  
        'status_id', 
        'parent', //parent task

        'preceedby',
        'succeedby'
    ];

    public function executor() {
        return $this->belongsTo(User::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function subtasks() {
        return $this->hasMany(SubTask::class);
    }

    public function resources() {
        return $this->hasMany(Resource::class);
    }

    public function parent() {
        return $this->hasOne(Task::class);
    }

    public function children() {
        return $this->hasMany(Task::class);
    }

    public function members() {
        return $this->hasMany(TeamMember::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
}
