<?php

namespace Database\Seeders;

use App\Models\Department;
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
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('testpass'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'user1',
                'email' => 'user1@user.com',
                'password' => bcrypt('testpass'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'user2',
                'email' => 'user2@user.com',
                'password' => bcrypt('testpass'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        User::insert($userInfo);
    }
}
