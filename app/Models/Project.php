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
        'budget', 
        'owner',

        'duedate', 
        
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

    public function resources() {
        return $this->hasMany(Resource::class);
    }
    
    public function members() {
        return $this->hasMany(TeamMember::class);
    }

    public function inventory() {
        return $this->hasOne(Inventory::class);
    }
}
