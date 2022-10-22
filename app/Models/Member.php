<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $guarded = [];

    const MEMBER_STATUS = [
        'ACTIVE' => 1,
        'DEACTIVATE' => 2
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getUserRoleAttribute() {
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

    public function getPrimitiveUserRoleAttribute() {
        return $this->user->getRoleNames()[0];
    }

    public function departments() {
        return $this->belongsToMany(Department::class, 'department_member');
    }
}
