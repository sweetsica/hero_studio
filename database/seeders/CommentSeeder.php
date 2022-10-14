<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Member;
use App\Models\Task;
use Faker\Provider\Lorem;
use Faker\Provider\Person;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tasks = Task::pluck('id');
        $members = Member::pluck('id')->toArray();

        $comments = [];
        foreach ($tasks as $task) {
            $randomNumberComment = rand(5, 10);
            for ($i = 0; $i < $randomNumberComment; $i++) {
                $comment = [
                    'member_id' => array_rand($members) + 1,
                    'task_id' => $task,
                    'content' => Lorem::text(50)
                ];

                array_push($comments, $comment);
            }
        }

        Comment::insert($comments);
    }
}
