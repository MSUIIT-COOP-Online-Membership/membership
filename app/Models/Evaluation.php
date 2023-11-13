<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'branch_id',
        'q_one',
        'q_two',
        'q_three',
        'q_four',
        'q_five',
        'q_six',
        'q_seven',
        'q_eight',
        'q_nine',
        'q_ten',
        'score',
        'pass_status',
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
}
