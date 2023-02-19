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
                return 'Trưởng phòng';
            case 'key opinion leaders':
                return 'KOL';
            case 'editor':
                return 'Nhân viên';
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
        return $this->memberEditorTasks->merge($this->memberCreatorTasks);
//        return $this->hasMany(Task::class);
    }

    public function doneTasks()
    {
        return $this->hasMany(Task::class)->where('status_code', Task::TASK_STATUS['DONE']);
    }

    public function lastMonthTasks()
    {
        return $this->lastMonthMemberEditorTasks->merge($this->lastMonthMemberCreatorTasks);
    }

    public function lastMonthDoneTasks()
    {
        return $this->lastMonthDoneEditorTasks->merge($this->lastMonthDoneCreatorTasks);
    }

    public function memberEditorTasks()
    {
        return $this->hasMany(Task::class);
    }

    public function memberCreatorTasks()
    {
        return $this->hasMany(Task::class, 'creator_id');
    }

    public function editorTaskByMonth($month, $year) {
        return $this->hasMany(Task::class)
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->get();
    }

    public function editorTaskDoneByMonth($month, $year) {
        return $this->hasMany(Task::class)
        ->where('status_code', Task::TASK_STATUS['DONE'])
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->get();
    }

    public function lastMonthMemberEditorTasks()
    {
        return $this->hasMany(Task::class);
//        ->whereMonth(
//            'tasks.created_at', '=', Carbon::now()->subMonth()->month
//        );
    }

    public function lastMonthMemberCreatorTasks()
    {
        return $this->hasMany(Task::class, 'creator_id');
//        ->whereMonth(
//            'tasks.created_at', '=', Carbon::now()->subMonth()->month
//        );
    }

    public function lastMonthDoneEditorTasks()
    {
        return $this->hasMany(Task::class)->where('status_code', Task::TASK_STATUS['DONE']);
//        ->whereMonth(
//            'tasks.created_at', '=', Carbon::now()->subMonth()->month
//        );
    }

    public function lastMonthDoneCreatorTasks()
    {
        return $this->hasMany(Task::class, 'creator_id')->where('status_code', Task::TASK_STATUS['DONE']);
//        ->whereMonth(
//            'tasks.created_at', '=', Carbon::now()->subMonth()->month
//        );
    }

    /**
     * @param $year
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function taskByYear($year) {
        $dataEditor = $this->memberEditorTasks()->whereYear('created_at','=', $year)->get();
        $dataCreator =  $this->memberCreatorTasks()->whereYear('created_at','=', $year)->get();

        return $dataEditor->merge($dataCreator)->sortByDesc('created_at');
    }

    /**
     * @param $year
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function taskByYearMonth($year, $month) {
        $dataEditor = $this->memberEditorTasks()->whereYear('created_at','=', $year)->whereMonth('created_at', '=', $month)->get();
        $dataCreator =  $this->memberCreatorTasks()->whereYear('created_at','=', $year)->whereMonth('created_at', '=', $month)->get();

        return $dataEditor->merge($dataCreator)->sortByDesc('created_at');
    }
}
