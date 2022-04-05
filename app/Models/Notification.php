<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        // 'tag',

        'project_id',
        'task_id',
        'sub_task_id',
        'grand_task_id',
        'great_task_id',
        'user_id',

        'resource_id',
        'request_fq_id',
        'quote_id',
        'payment_id',

        'status_id'        
    ];

    
    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function subtask() {
        return $this->belongsTo(SubTask::class);
    }

    public function grandtask() {
        return $this->belongsTo(GrandTask::class);
    }

    public function greattask() {
        return $this->belongsTo(GreatTask::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function reource() {
        return $this->belongsTo(Resource::class);
    }

    public function requestFq() {
        return $this->belongsTo(ResourceFq::class);
    }

    public function quote() {
        return $this->belongsTo(Quote::class);
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }
}
