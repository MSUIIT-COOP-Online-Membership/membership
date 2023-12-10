<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spouses extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'member_id',
        'spouse_fname',
        'spouse_mname',
        'spouse_lname',
        'spouse_suffix',
        'spouse_dob',
        'spouse_age',
        'spouse_contact',
        'spouse_occu',
        'spouse_emp_name',
        'spouse_emp_stat',
        'spouse_monthly_income',
    ];
}
