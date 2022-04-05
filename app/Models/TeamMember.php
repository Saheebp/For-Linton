<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'task_id',
        'user_id'
    ];
    
    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function project() {
        return $this->belongsTo(PRojct::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
