<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;
    protected $table = 'branches_';
    protected $fillable = [
        'name',
        'area',
        'address',
        'tel_no',
        'mobile_no',
        'email',
    ];
}
