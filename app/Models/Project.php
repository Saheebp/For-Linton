<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'objective', 
        'owner',

        'start',
        'end',
        
        'nature',
        'type',
        'funding_source',
        'budget', 
        'actual_cost',

        'sponsor_name',
        'sponsor_email',
        'sponsor_phone',

        'state',
        'lga',
        'address',
        
        'manager_id', 
        'creator_id',  
        'status_id'
    ];

    
    public function manager() {
        return $this->belongsTo(User::class);
    }

    public function creator() {
        return $this->belongsTo(User::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
    
    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function subtasks() {
        return $this->hasMany(SubTask::class);
    }

    public function resources() {
        return $this->hasMany(Resource::class);
    }
    
    public function members() {
        return $this->hasMany(ProjectMember::class);
    }

    public function inventory() {
        return $this->hasOne(Inventory::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function logs() {
        return $this->hasMany(Log::class);
    }
}
