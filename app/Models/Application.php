<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status',
        'member_id',
        'branch_id',
        'approved_by',
        'payment_id',
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
        return $this->belongsTo(Staff::class, 'approved_by');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
