<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

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

    // Define the relationship with the Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
