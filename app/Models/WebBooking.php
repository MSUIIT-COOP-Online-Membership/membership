<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'web_id',
        'status',
    ];

    // Define the relationship with the Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function webinar()
    {
        return $this->belongsTo(Webinar::class, 'web_id');
    }

}
