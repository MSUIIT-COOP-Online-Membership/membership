<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'branch_id',
        'subject',
        'date',
        'start_time',
        'end_time',
        'status',
    ];

    // Define the relationship with the Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id')->withDefault();
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
