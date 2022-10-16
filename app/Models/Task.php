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
        'REVIEW' => 3,
        'DONE' => 4
    ];

    protected $guarded = [];
}
