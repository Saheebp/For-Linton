<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'address',
        'phone1',
        'phone2',
        'email',
        'web_url',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'youtube_url',
    ];
}
