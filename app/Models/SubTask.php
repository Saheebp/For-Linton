<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
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
        
        'longitude',
        'latitude',
        
        'executor_id',  
        'project_id',
        'task_id',
        'group_id',  
        'status_id',

        'preededby',
        'succeeedby'
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

    public function task() {
        return $this->belongsTo(Project::class);
    }
    
    public function resources() {
        return $this->hasMany(Resource::class);
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
