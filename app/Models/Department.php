<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

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
}
