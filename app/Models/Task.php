<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const TASK_STATUS = [
        'SENT' => 1,
        'IN_PROGRESS' => 2,
        'DONE' => 3,
        'REDO' => 4
    ];

    protected $guarded = [];
}
