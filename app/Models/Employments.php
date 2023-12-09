<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employments extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'member_id',
        'emp_stat',
        'emp_type',
        'profession',
        'emp_others',
        'business_type',
        'asset_size',
    ];
}
