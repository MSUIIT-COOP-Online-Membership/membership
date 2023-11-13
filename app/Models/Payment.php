<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'branch_id',
        'amount',
        'coop_teller',
    ];

    // Define the relationship with the Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'coop_teller');
    }
}
