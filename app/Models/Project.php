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

        'startdate', 
        'enddate', 
        
        'manager', 
        'creator',  
        'status_id'
    ];

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function manager() {
        return $this->belongsTo(User::class);
    }

    public function creator() {
        return $this->belongsTo(User::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function resources() {
        return $this->hasMany(Resource::class);
    }
    
    public function members() {
        return $this->hasMany(Member::class);
    }
}
