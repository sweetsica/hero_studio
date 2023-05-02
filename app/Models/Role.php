<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    const ROLE_SUPER_ADMIN = 'super admin';
    const ROLE_KOLS = 'key opinion leaders';
    const ROLE_COF = 'chief of department';
    const ROLE_EDITOR = 'editor';

    const ROLE_ACCOUNT = 'account';

    const roles = [
        'kols' => self::ROLE_KOLS,
        'cof' =>  self::ROLE_COF,
        'editor' => self::ROLE_EDITOR,
        'account' => self::ROLE_ACCOUNT,
    ];
}
