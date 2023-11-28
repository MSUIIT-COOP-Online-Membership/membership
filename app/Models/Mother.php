<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    use HasFactory;

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

    // Define the relationship with the Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
