<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable = [
        'web_tool',
        'date',
        'start_time',
        'end_time',
        'resource_speaker',
        'web_link',
    ];
}
