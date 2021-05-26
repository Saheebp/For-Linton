<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'subject', 
        'description',
        'start',
        'end',
        'creator_id',  
        'department_id',  
        'status_id'
    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function creator() {
        return $this->belongsTo(User::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function quotes() {
        return $this->hasMany(ProcQuote::class);
    }

    public function files() {
        return $this->hasMany(ProcFile::class);
    }

    public function requests() {
        return $this->hasMany(ProcContractor::class);
    }
}
