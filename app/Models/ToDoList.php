<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',          // The content of the To-Do item
        'completed',     // Whether the To-Do item is completed or not
        'due_date',      // Due date for the To-Do item (if applicable)
    ];
}
