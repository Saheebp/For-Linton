<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'order',
        'description', 
        'budget', 
        'actual_cost',
        
        'start', 
        'end', 
        'mid', 
        
        'longitude',
        'latitude',
        
        'executor_id',  
        'project_id',
        'group_id',  
        'status_id', 

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

    public function grandtasks() {
        return $this->hasMany(GrandTask::class);
    }

    public function greattasks() {
        return $this->hasMany(GreatTask::class);
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
        return $this->hasMany(TaskMember::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
    
    public function logs() {
        return $this->hasMany(Message::class);
    }
}
