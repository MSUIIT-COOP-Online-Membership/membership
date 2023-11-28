<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    use HasFactory;

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

    // Define the relationship with the Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
