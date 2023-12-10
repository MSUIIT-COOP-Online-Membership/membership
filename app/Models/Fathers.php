<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fathers extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'member_id',
        'father_fname',
        'father_mname',
        'father_lname',
        'father_suffix',
        'father_dob',
        'father_age',
        'father_contact',
        'father_occu',
    ];
}
