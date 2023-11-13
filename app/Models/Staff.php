<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'lname',
        'mname',
        'fname',
        'suffix',
        'sex',
        'civil_status',
        'dob',
        'age',
        'tel_no',
        'mobile_no',
        'email',
        'present_address',
        'position',
        'id_photo',
    ];
}
