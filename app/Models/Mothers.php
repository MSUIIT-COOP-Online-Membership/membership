<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mothers extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'member_id',
        'mother_fname',
        'mother_mname',
        'mother_lname',
        'mother_suffix',
        'mother_dob',
        'mother_age',
        'mother_contact',
        'mother_occu',
    ];
}
