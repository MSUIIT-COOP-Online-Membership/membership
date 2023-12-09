<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergencies extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'member_id',
        'emer_name',
        'emer_contact',
        'emer_address',
    ];
}
