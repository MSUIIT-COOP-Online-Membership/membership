<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childrens extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'member_id',
        'no_child',
        'no_child_contrib',
        'total_monthly_contrib',
        'no_child_work',
        'no_child_study',
        'no_child_notstudy',
    ];
}
