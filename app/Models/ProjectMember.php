<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_id',
        'user_id'
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}