<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'member_id',
        'business_name',
        'business_tin',
        'business_address',
        'business_contact',
        'op_duration_year',
        'op_duration_month',
        'no_workers',
        'yearly_income',
        'source_income',
        'monthly_income',
    ];
}
