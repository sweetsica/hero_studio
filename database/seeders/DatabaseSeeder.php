<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PositionSeeder::class,
            MemberSeeder::class,
//            DepartmentSeeder::class,
//            TaskSeeder::class,
//            CommentSeeder::class,
//            CategorySeeder::class,
//            PostSeeder::class,
        ]);
    }
}
