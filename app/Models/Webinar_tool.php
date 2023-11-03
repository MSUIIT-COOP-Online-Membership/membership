<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar_tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id',
        'tool_name',
        'attending_status'
    ]; 
    
}
