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
                'name' => 'Creating web task',
                'member_id' => 1,
                'department_id' => 1,
                'content' => 'aaaa',
                'deadline' => Carbon::now(),
                'status_code' => Task::TASK_STATUS['SENT'],

                'product_length' => '20',
                'product_name' => 'Hero Studio Product Data',
                'product_description' => Lorem::text(),

                'source' => 'Other',
                'url_source' => Image::imageUrl(),  // example with image

                'url_fanpage' => Image::imageUrl(),
                'url_facebook' => Image::imageUrl(),
                'url_youtube' => Image::imageUrl(),
                'url_tiktok' => Image::imageUrl(),
                'url_others' => Image::imageUrl(),
                'creator_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Creating Seeding Data',
                'member_id' => 1,
                'department_id' => 1,
                'content' => Lorem::text(),
                'deadline' => Carbon::now(),
                'status_code' => Task::TASK_STATUS['IN_PROGRESS'],

                'product_length' => '20',
                'product_name' => 'Database Seeder Laravel',
                'product_description' => Lorem::text(),

                'source' => 'Other',
                'url_source' => Image::imageUrl(),  // example with image

                'url_fanpage' => Image::imageUrl(),
                'url_facebook' => Image::imageUrl(),
                'url_youtube' => Image::imageUrl(),
                'url_tiktok' => Image::imageUrl(),
                'url_others' => Image::imageUrl(),
                'creator_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Creating Seeding Data',
                'member_id' => 1,
                'department_id' => 1,
                'content' => Lorem::text(),
                'deadline' => Carbon::now(),
                'status_code' => Task::TASK_STATUS['IN_PROGRESS'],

                'product_length' => '20',
                'product_name' => 'Convitcon Hello',
                'product_description' => Lorem::text(),

                'source' => 'Other',
                'url_source' => Image::imageUrl(),  // example with image

                'url_fanpage' => Image::imageUrl(),
                'url_facebook' => Image::imageUrl(),
                'url_youtube' => Image::imageUrl(),
                'url_tiktok' => Image::imageUrl(),
                'url_others' => Image::imageUrl(),
                'creator_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Creating Migration For Data',
                'member_id' => 2,
                'department_id' => 1,
                'content' => Lorem::text(),
                'deadline' => Carbon::now(),
                'status_code' => Task::TASK_STATUS['REDO'],

                'product_length' => '20',
                'product_name' => 'This is new Era',
                'product_description' => Lorem::text(),

                'source' => 'Other',
                'url_source' => Image::imageUrl(),  // example with image

                'url_fanpage' => Image::imageUrl(),
                'url_facebook' => Image::imageUrl(),
                'url_youtube' => Image::imageUrl(),
                'url_tiktok' => Image::imageUrl(),
                'url_others' => Image::imageUrl(),
                'creator_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Creating Seeder For Data',
                'member_id' => 3,
                'department_id' => 2,
                'content' => Lorem::text(),
                'deadline' => Carbon::now(),
                'status_code' => Task::TASK_STATUS['REDO'],

                'product_length' => '20',
                'product_name' => 'Youtube viet cetera rhymastic',
                'product_description' => Lorem::text(),

                'source' => 'Other',
                'url_source' => Image::imageUrl(),  // example with image

                'url_fanpage' => Image::imageUrl(),
                'url_facebook' => Image::imageUrl(),
                'url_youtube' => Image::imageUrl(),
                'url_tiktok' => Image::imageUrl(),
                'url_others' => Image::imageUrl(),
                'creator_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
    }
}
