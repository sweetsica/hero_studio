<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const TASK_STATUS = [
        'SENT' => 1,        // Trạng thái khi tạo task
        'IN_PROGRESS' => 2, // Task đang được làm
        'DONE' => 3,        // Task được báo hoàn thành
        'REDO' => 4,        // Task bị yêu cầu làm lại
        'CLOSE' => 5,       // Task kết thúc
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
