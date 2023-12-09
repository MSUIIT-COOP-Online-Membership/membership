<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'member_id',
        'duration_residency',
        'living_parents',
        'house',
        'house_month',
        'lot',
        'lot_month',
        'house_yearly_income',
    ];
}
