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
        'designation_id',
        'profile_update_status',
        'is_admin',
        // 'order_count',

        'org_name',
        'org_email',
        'org_phone',
        'org_address',
        'org_logo',
        'org_nature',
        'org_quote_count',
        'is_contractor',
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
    
    public function messages() {
        return $this->hasMany(Message::class);
    } 
    
    public function comments() {
        return $this->hasMany(Comment::class);
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

    public function requests() {
        return $this->hasMany(RequestFq::class);
    }

    public function projects() {
        return $this->hasMany(ProjectMember::class);
    }

    public function tasks() {
        return $this->hasMany(TaskMember::class);
    }

    public function subtasks() {
        return $this->hasMany(SubTaskMember::class);
    }

    public function grandtasks() {
        return $this->hasMany(GrandTaskMember::class);
    }

    public function greattasks() {
        return $this->hasMany(GreatSubTask::class);
    }
    
    public function quotes() {
        return $this->hasMany(Quote::class);
    }

    public function userResources() {
        return $this->hasMany(UserResource::class);
    }
}
