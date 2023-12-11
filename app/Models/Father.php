<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    use HasFactory;

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

    // Define the relationship with the Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
