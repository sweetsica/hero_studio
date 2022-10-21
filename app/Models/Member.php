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
}
