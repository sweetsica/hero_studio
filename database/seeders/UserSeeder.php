<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\Lorem;
use Faker\Provider\Person;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userInfo = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin@admin.com'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Anh Sơn',
                'email' => 'cof@user.com',
                'password' => bcrypt('cof@user.com'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mèo Hồng KOL',
                'email' => 'kol@user.com',
                'password' => bcrypt('kol@user.com'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Trần Lâm Editor',
                'email' => 'editor@user.com',
                'password' => bcrypt('testpass'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        User::insert($userInfo);
        $user = User::find(1);
        $user->syncRoles('super admin');
        $user = User::find(2);
        $user->syncRoles(Role::ROLE_COF);
        $user = User::find(3);
        $user->syncRoles(Role::ROLE_KOLS);
        $user = User::find(4);
        $user->syncRoles(Role::ROLE_EDITOR);
    }
}
