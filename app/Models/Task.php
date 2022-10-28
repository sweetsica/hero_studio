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
        'RECEIVED' => 6,    // Task đã được nhận
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
            default:
                return $this->status_code;
        }
    }

    public function getRawStatusCodeAttribute() {
        return $this->status_code;
    }

//    public function setStatusCodeAttribute($value)
//    {
//        switch ($value){
//            case "Đang chờ nhận":
//                return $this->attributes['status_code'] = '1';
//            case "Đang thực hiện":
//                return $this->attributes['status_code'] = '2';
//            case "Đã hoàn thành":
//                return $this->attributes['status_code'] = '3';
//            case "Cần làm lại":
//                return $this->attributes['status_code'] = '4';
//            default:
//                return $value;
//        }
//    }

}
