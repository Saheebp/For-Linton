<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone', 
        'address', 
        'avatar', 
        'status_id', 
        'profile_update_status',
        'is_admin',
        'order_count',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payments() {
        return $this->hasMany(Payment::class);
    }
    
    public function manages() {
        return $this->hasMany(Project::class);
    } 
    
    public function executes() {
        return $this->hasMany(Task::class);
    } 
    
    public function subtasks() {
        return $this->hasMany(SubTask::class);
    }
    
    public function resources() {
        return $this->hasMany(Resource::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function designation() {
        return $this->belongsTo(Designation::class);
    }
}
