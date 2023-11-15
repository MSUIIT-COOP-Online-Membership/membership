<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'ben_fname',
        'ben_mname',
        'ben_lname',
        'ben_suffix',
        'ben_dob',
        'ben_relationship',
    ];        

    // Define the relationship with the Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
