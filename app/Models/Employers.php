<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employers extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'member_id',
        'employer_name',
        'service_length',
        'employer_status',
        'employer_address',
        'employer_contact',
        'monthly_salary',
    ];
}
