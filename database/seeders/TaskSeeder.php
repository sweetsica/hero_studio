<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Task;
use Carbon\Carbon;
use Faker\Provider\Image;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $taskInfos = $this->sampleData();

        Task::insert($taskInfos);
    }

    public function sampleData()
    {
        return [
            [
                'name' => 'Nhiệm vụ demo 1',
                'member_id' => 4,
                'department_id' => 1,

                'content' => 'Nội dung demo',
                'deadline' => Carbon::now(),
                'status_code' => Task::TASK_STATUS['SENT'],

                'product_length' => '20',
                'product_name' => 'Hero Studio Product Data',
                'product_description' => Lorem::text(),

                'source' => 'Other',
                'url_source' => Image::imageUrl(),  // example with image
                'url_others' => Image::imageUrl(),

                'creator_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nhiệm vụ demo 2',
                'member_id' => 4,
                'department_id' => 1,

                'content' => Lorem::text(),
                'deadline' => Carbon::now(),
                'status_code' => Task::TASK_STATUS['IN_PROGRESS'],

                'product_length' => '20',
                'product_name' => 'Database Seeder Laravel',
                'product_description' => Lorem::text(),

                'source' => 'Other',
                'url_source' => Image::imageUrl(),  // example with image
                'url_others' => Image::imageUrl(),

                'creator_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nhiệm vụ demo 3',
                'member_id' => 4,
                'department_id' => 2,

                'content' => 'Nội dung demo',
                'deadline' => Carbon::now(),
                'status_code' => Task::TASK_STATUS['DONE'],

                'product_length' => '20',
                'product_name' => 'Hero Studio Product Data',
                'product_description' => Lorem::text(),

                'source' => 'Other',
                'url_source' => Image::imageUrl(),  // example with image
                'url_others' => Image::imageUrl(),

                'creator_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nhiệm vụ demo 4',
                'member_id' => 4,
                'department_id' => 2,

                'content' => 'Nội dung demo',
                'deadline' => Carbon::now(),
                'status_code' => Task::TASK_STATUS['REDO'],

                'product_length' => '20',
                'product_name' => 'Hero Studio Product Data',
                'product_description' => Lorem::text(),

                'source' => 'Other',
                'url_source' => Image::imageUrl(),  // example with image
                'url_others' => Image::imageUrl(),

                'creator_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
    }
}
