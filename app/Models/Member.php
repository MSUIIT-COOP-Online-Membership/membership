<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_photo',
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
        'religion',
        'email',
        'place_birth',
        'present_address',
        'tin',
        'educational_attainment',
        'e_signature',
        'app_date',
    ];        
}
