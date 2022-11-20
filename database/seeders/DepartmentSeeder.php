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
                'name' => 'Phòng Editor',
                'description' => Lorem::text(50),
                'department_head_id' => 5,
                'status' => Department::STATUS['READY'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Phòng Design',
                'description' => Lorem::text(50),
                'department_head_id' => 6,
                'status' => Department::STATUS['READY'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Phòng KOL',
                'description' => Lorem::text(50),
                'department_head_id' => 2,
                'status' => Department::STATUS['READY'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chưa phân loại',
                'description' => Lorem::text(50),
                'department_head_id' => 1,
                'status' => Department::STATUS['READY'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Department::insert($departmentInfo);
    }
}
