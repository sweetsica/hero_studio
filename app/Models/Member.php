<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];

    const MEMBER_STATUS = [
        'ACTIVE' => 1,
        'DEACTIVATE' => 2
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserRoleAttribute()
    {
        $role = $this->user->getRoleNames()[0];
        switch ($role) {
            case 'chief of department':
                return 'Quản lý';
            case 'key opinion leaders':
                return 'Kol';
            case 'editor':
                return 'Editor';
            default:
                return 'Admin';
        }
    }

    public function getPrimitiveUserRoleAttribute()
    {
        return $this->user->getRoleNames()[0];
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_member');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function doneTasks()
    {
        return $this->hasMany(Task::class)->where('status_code', Task::TASK_STATUS['DONE']);
    }

    public function lastMonthTasks()
    {
        return $this->hasMany(Task::class);

        // 30 ngày trước
//        return $this->hasMany(Task::class)->where(
//            'created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString()
//        );

        // tháng trước
        return $this->hasMany(Task::class)->whereMonth(
            'tasks.created_at', '=', Carbon::now()->subMonth()->month
        );
    }

    public function lastMonthDoneTasks()
    {
        return $this->hasMany(Task::class)->where('status_code', Task::TASK_STATUS['DONE'])->whereMonth(
            'tasks.created_at', '=', Carbon::now()->subMonth()->month
        );
    }
}
