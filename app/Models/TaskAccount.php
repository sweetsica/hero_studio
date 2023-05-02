<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAccount extends Model
{
    use HasFactory;

    protected $guarded = [];

    use HasFactory;

    const TASK_STATUS = [
        'SENT' => 1,            // Trạng thái khi tạo task
        'IN_PROGRESS' => 2,     // Task đang được làm
        'DONE' => 3,            // Task được báo hoàn thành
        'REDO' => 4,            // Task bị yêu cầu làm lại
        'CLOSE' => 5,           // Task kết thúc
        'WAITING_CONFIRM' => 6, // Chờ xác nhận task
    ];

    const TASK_TYPE = [
        'Thường' => 'Normal',
        'Được tài trợ' => 'Sponsor',
        'Short' => 'Short'
    ];

    public function creator() {
        return $this->belongsTo(Member::class, 'creator_id');
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function comments() {
        return $this->hasMany(TaskAccountComment::class,'task_id');
    }

    public function getStatusCodeTextAttribute()
    {
        switch ($this->status_code){
            case "1":
                return $this->attributes['status_code'] = 'Đang chờ nhận';
            case "2":
                return $this->attributes['status_code'] = 'Đang thực hiện';
            case "3":
                    return $this->attributes['status_code'] = 'Đã hoàn thành';
            case "4":
                return $this->attributes['status_code'] = 'Cần làm lại';
            case "5":
                return $this->attributes['status_code'] = 'Đóng';
            default:
                return $this->status_code;
        }
    }
}
