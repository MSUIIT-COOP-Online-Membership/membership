<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premember extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'gender',
        'date_of_birth',
        'civil_status',
        'email',
        'telephone_number',
        'mobile_number',
        'facebook_account',
        'present_address',
        'ofw_family_member',
        'occupation',
    ];

}
