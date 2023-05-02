<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Department extends Model
{
    use HasFactory;

    const STATIC_DEPARTMENT = [
        self::DEPARTMENT_ACCOUNT,
        self::DEPARTMENT_KOL,
    ];
    const DEPARTMENT_ACCOUNT = 'Phòng Account';
    const DEPARTMENT_KOL = 'Phòng KOL';

    const STATUS = [
        'READY' => 1
    ];
    protected $guarded = [];

    public function members() {
        return $this->belongsToMany(Member::class, 'department_member');
    }

    public function departmentHead() {
        return $this->belongsTo(Member::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function doneTasks() {
        return $this->hasMany(Task::class)->where('status_code', Task::TASK_STATUS['DONE']);
    }
}
