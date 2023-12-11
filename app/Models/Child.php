<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'no_child',
        'no_child_contrib',
        'total_monthly_contrib',
        'no_child_work',
        'no_child_study',
        'no_child_notstudy',
    ];

    // Define the relationship with the Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
