<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class STaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            "name"=> "KOL-1 Tạo video facebook",
            "member_id"=> 4,
            "creator_id"=> 3,
            "department_id"=> 1,
            "content" => "Nội dung task tạo bởi KOL 1",
            "deadline" => "2022-11-16 03:48:01",
            "status_code" => Task::TASK_STATUS['SENT'],

            'product_length' => '20',
            'product_name' => 'Sản phẩm task 1',
            'product_description' => 'Mô tả sản phẩm task 1',
            'source' => 'Facebook',
            'url_source' => 'https://www.youtube.com/watch?v=q3HSr-Hfbag',


            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
