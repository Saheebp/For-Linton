<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreatTaskMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'great_task_id',
        'user_id'
    ];
    
    public function greattask() {
        return $this->belongsTo(GreatTask::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
