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

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
