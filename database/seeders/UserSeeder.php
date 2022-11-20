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
                'name' => 'KOL original',
                'email' => 'kol@user.com',
                'password' => bcrypt('kol@user.com'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Editor Original',
                'email' => 'editor@user.com',
                'password' => bcrypt('editor@user.com'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Designer Original',
                'email' => 'designer@user.com',
                'password' => bcrypt('designer@user.com'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Trưởng phòng Editor',
                'email' => 'leadereditor@user.com',
                'password' => bcrypt('leadereditor@user.com'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Trưởng phòng Designer',
                'email' => 'leaderdesign@user.com',
                'password' => bcrypt('leaderdesign@user.com'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

        User::insert($userInfo);
        $user = User::find(1);
        $user->syncRoles('super admin');
        $user = User::find(2);
        $user->syncRoles(Role::ROLE_KOLS);
        $user = User::find(3);
        $user->syncRoles(Role::ROLE_EDITOR);
        $user = User::find(4);
        $user->syncRoles(Role::ROLE_EDITOR);
        $user = User::find(5);
        $user->syncRoles(Role::ROLE_COF);
        $user = User::find(6);
        $user->syncRoles(Role::ROLE_COF);
    }
}
