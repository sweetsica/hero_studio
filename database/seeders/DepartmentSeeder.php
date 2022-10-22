<?php

namespace Database\Seeders;

use App\Models\Department;
use Carbon\Carbon;
use Faker\Provider\Lorem;
use Faker\Provider\Person;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $departmentInfo = [
            [
                'name' => 'Web Department',
                'description' => Lorem::text(50),
                'department_head_id' => 1,
                'status' => Department::STATUS['READY'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Solution Department',
                'description' => Lorem::text(50),
                'department_head_id' => 2,
                'status' => Department::STATUS['READY'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mobile Department',
                'description' => Lorem::text(50),
                'department_head_id' => 2,
                'status' => Department::STATUS['READY'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Department::insert($departmentInfo);
    }
}
