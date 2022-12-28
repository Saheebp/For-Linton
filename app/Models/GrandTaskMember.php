<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrandTaskMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'grand_task_id',
        'user_id',
        'status_id'
    ];
    
    public function grandtask() {
        return $this->belongsTo(GrandTask::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
